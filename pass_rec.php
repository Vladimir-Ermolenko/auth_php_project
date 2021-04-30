<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recover Password</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<form action="check_pass_rec.php" method="POST">
    <h1 class="main_heading">Password Recovery</h1>
    <div class="row">
        <label for="email_rec" class="form_label" >EMAIL</label>
        <input type="text" name="email_rec" id="email_rec" class="form_input">
    </div>
    <div>
        <input type="submit" name="send_rec" id="button" value="SEND TEMPORARY PASSWORD">
    </div>
</form>

</body>
</html>
