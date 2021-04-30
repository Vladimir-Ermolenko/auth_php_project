<?php

session_start();

if($_POST["captcha_code"] == strtoupper($_SESSION["captcha_code"])){
    //captcha is validated. So process the form further
    
    $host = 'localhost';
    $user_name = 'root';
    $password = '12345';
    $data_base = 'auth';
    $port = '3306';
    $socket = '';

    $conn = mysqli_connect($host, $user_name, $password, $data_base, $port, $socket) or die("No connection");

    $login = $_POST['login_reg'];
    $email = $_POST['email_reg'];
    $password = md5($_POST['password_reg']);
    $first_name_reg = $_POST['first_name_reg'];
    $second_name_reg = $_POST['second_name_reg'];
    $birthday_reg = $_POST['birthday_reg'];
    $code = substr(md5(rand(0,999)), 15, 50);

    $query = "INSERT INTO `users` (`id`, `login`, `password`, `email`, `first_name`, `second_name`, `birthday`, `code`) VALUES (NULL, '$login', '$password', '$email', '$first_name_reg', '$second_name_reg', '$birthday_reg', '$code')";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        echo $conn -> error;
    } else {


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

        $mail->Subject = 'Your verification link';
        $mail->Body = 'http://localhost/auth/email_verif.php?code=' . $code;

        if (!$mail->send()) {
            echo 'Error';
        } else {
            header('location: thank_reg.html');
        }
    }


}
else{
    //captcha characters don't match
    header('location: reg_again.php');
}

?>