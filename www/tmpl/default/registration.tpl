<center>

    <p style="color:red;">%error_reg%</p>
    <form name="reg" action="/user/registration/" method="post">
        <b>Login: </b><br />
        <input type="text" name="login" /><br />
        <b>E-mail: </b><br />
        <input type="text" name="email" /><br />
        <b>Password: </b><br />
        <input type="password" name="password1" /><br />
        <b>Ripeti password: </b><br />
        <input type="password" name="password2" /><br /><hr />
        <b>%captcha%</b><br />
        <input type="text" name="captcha" /><br />
        <input type="submit" name="send_reg" />
    </form>

</center>