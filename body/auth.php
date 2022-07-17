<!-- Register -->
<p>Register</p>
<form action="includes/auth/signup.php" method="post">
    <input type="text" name="first_name" placeholder="First name" />
    <input type="text" name="last_name" placeholder="Last name" />
    <input type="text" name="country" placeholder="Country" />
    <input type="text" name="city" placeholder="City" />
    <input type="text" name="address" placeholder="Address" />
    <input type="password" name="pwd" placeholder="Password" />
    <input type="password" name="pwdrepeat" placeholder="Repeat Password" />
    <input type="email" name="email" placeholder="E-mail" />
    <button type="submit" name="submit">REGISTER</button>
</form>
<h3>Or</h3>
<!-- Login -->
<p>Login</p>
<form action="includes/auth/login.php" method="post">
    <input type="email" name="email" placeholder="E-mail" />
    <input type="password" name="pwd" placeholder="Password" />
    <button type="submit" name="submit">LOGIN</button>
</form>