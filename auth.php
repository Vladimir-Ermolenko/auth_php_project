<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <form action="check_auth.php" method="POST">
        <h1 class="main_heading">Hello! Do you want to log in?</h1>
        <div class="row">
            <label for="login_auth" class="form_label" >LOGIN</label>
            <input type="text" name="login_auth" id="login_auth" class="form_input" placeholder="USER">
        </div>
        <div class="row">
            <label for="password_auth" class="form_label">PASSWORD</label>
            <input type="password" name="password_auth" id="password_auth" class="form_input" placeholder="********">
        </div>

        <div>
            <input type="submit" name="send_auth" id="button" value="SIGN IN">
        </div>
    </form>
    <table class="buttons">
        <tr>
            <td>
                <form action="pass_rec.php">
                    <input id="buttons" type="submit" value="FORGOT PASSWORD?">
                </form>
            </td>
            <td>
                <form action="reg.php">
                    <input id="buttons" type="submit" value="SIGN UP">
                </form>
            </td>
        </tr>
    </table>

</body>
</html>
