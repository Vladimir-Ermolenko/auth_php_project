<?php
$host = 'localhost';
$user_name = 'root';
$password = '12345';
$data_base = 'auth';
$port = '3306';
$socket = '';

$conn = mysqli_connect($host, $user_name, $password, $data_base, $port, $socket) or die("No connection");

$email = $_POST['email_rec'];

$query = "SELECT email FROM `users`";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    // output data of each row
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        if ($row['email'] == $email) {
            $password = substr(md5(rand(0,999)), 15, 10);
            $password_encr = md5($password);
            $query_1 = "UPDATE `users` SET password='$password_encr' WHERE email='$email'";
            $result_1 = mysqli_query($conn, $query_1);

            require_once('phpmailer/PHPMailerAutoload.php');
            $mail = new PHPMailer;
            $mail->CharSet = 'utf-8';

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                                                                                            // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'voverm.28@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
            $mail->Password = 'Vovius2228563'; // Ваш пароль от почты с которой будут отправляться письма
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

            $mail->setFrom('voverm.28@gmail.com'); // от кого будет уходить письмо?
            $mail->addAddress($email);     // Кому будет уходить письмо
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Your new password';
            $mail->Body = $password;

            if (!$mail->send()) {
                echo 'Error';
            } else {
                header('location: pass_rec_success.php');
            }

        } else {
            $counter += 1;
        }
    }
    if ($result->num_rows == $counter) {
        echo 'Invalid email';
    }
} else {
    echo "There is no data in the database";
}