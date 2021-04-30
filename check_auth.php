<?php
$host = 'localhost';
$user_name = 'root';
$password = '12345';
$data_base = 'auth';
$port = '3306';
$socket = '';

$conn = mysqli_connect($host, $user_name, $password, $data_base, $port, $socket) or die("No connection");

$login = $_POST['login_auth'];
$password = md5($_POST['password_auth']);

$query = "SELECT login, password FROM `users`";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    // output data of each row
    $counter = 0;
    while($row = $result->fetch_assoc()) {
        if($row['login'] == $login) {
            if($row['password'] == $password) {

                $cookie_name = $login;
                $cookie_value = md5(substr(rand(0,999), 15, 10));
                setcookie($cookie_name, $cookie_value, time() + 60, "/");
                session_start();

                $_SESSION['login'] = $login;


                header('location: profile.php');
            } else {
                echo 'Incorrect password';
            }
        } else {
            $counter += 1;
        }
    }
    if($result->num_rows == $counter) {
        echo 'Invalid login';
    }
} else {
    echo "There is no data in the database";
}

?>