<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form action="reg_db.php" method="POST">
        <h1 class="main_heading">Invalid captcha. Please, try again.</h1>
        <div class="row">
            <label for="login_reg" class="form_label" >LOGIN</label>
            <input type="text" name="login_reg" id="login_reg" class="form_input">
        </div>
        <div class="row">
            <label for="email_reg" class="form_label">EMAIL</label>
            <input type="text" name="email_reg" id="email_reg" class="form_input">
        </div>
        <div class="row">
            <label for="password_reg" class="form_label">PASSWORD</label>
            <input type="password" name="password_reg" id="password_reg" class="form_input">
        </div>
        <div class="row">
            <label for="first_name_reg" class="form_label">FIRST NAME</label>
            <input type="text" name="first_name_reg" id="first_name_reg" class="form_input">
        </div>
        <div class="row">
            <label for="second_name_reg" class="form_label">SECOND NAME</label>
            <input type="text" name="second_name_reg" id="second_name_reg" class="form_input">
        </div>
        <div class="row">
            <label for="birthday_reg" class="form_label">DATE OF BIRTH</label>
            <input type="text" name="birthday_reg" id="birthday_reg" class="form_input">
        </div>

        <div class="row">
            <img src="captcha.php">
            <div class="input">
                    <input type="text" name="captcha_code" id="input" class="form_input">
            </div>
        </div>

        <div>
            <input type="submit" name="send_reg" id="button" value="SIGN UP">
        </div>
    </form>
</body>
</html>
