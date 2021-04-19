<?php
$connect = mysqli_connect("localhost", "root", "", "user") or die("No connection");
$query ="SELECT * FROM user";
$result = mysqli_query($connect, $query) or die("No connection");
echo "WELCOME, ";
$login = $_COOKIE["Login"];
echo $login;
if($result)
{
    $rows = mysqli_num_rows($result);
    for ($i = 0 ; $i < ($rows) ; ++$i)
    {
    $row = mysqli_fetch_row($result);
    if ($row[1] === $login){
    $info = array($row[3], $row[4], $row[5], $row[6], $row[7], $row[8]); // массив с данными профиля
    }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>Name: <?php echo $info[1];?></br>
<br>Surname: <?php echo $info[2];?></br>
<br>Birth: <?php echo $info[3];?></br>
<br>Address: <?php echo $info[4];?></br>
<br>Sex: <?php echo $info[5];?></br>
<br>Status of email: <?php echo $info[0];?></br>
<?php
if ($info[0] === FALSE){
echo"email confirmed";
}else{
?>
<a href="email.php">link email</a>
<?php
}?>

</body>
</html>
