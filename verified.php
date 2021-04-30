<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div>
        <h1 class="success_message">Email successfully verified! You will be redirected within 5 seconds.</h1>
    </div>
</body>
</html>

<?php
header("Refresh:5; url=auth.php");
?>