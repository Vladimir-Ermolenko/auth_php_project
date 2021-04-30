<?php
$code = htmlspecialchars($_GET['code']);

$host = 'localhost';
$user_name = 'root';
$password = '12345';
$data_base = 'auth';
$port = '3306';
$socket = '';

$conn = mysqli_connect($host, $user_name, $password, $data_base, $port, $socket) or die("No connection");

$query = "SELECT code FROM `users`";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    // output data of each row
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        if ($row['code'] == $code) {
            $query_1 = "UPDATE `users` SET email_verif=1 WHERE code='$code'";
            $result_1 = mysqli_query($conn, $query_1);
            header('location: verified.php');
        } else {
            $counter += 1;
        }
    }
    if ($result->num_rows == $counter) {
        echo 'Invalid code';
    }
} else {
    echo "There is no data in the database";
}
?>