<div class="error-msg">
    <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>
</div>
<div class="success-msg">
        <?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ''; ?>
</div>
<div class="auth-card">
    <!-- Register -->
    <div class="register-card">
        <p>Register</p>
        <form action="includes/auth/signup.php" method="post">
            <div class="register-form">
                <input id="reg_firstname" onkeyup='saveValue(this)' class="text-input" type="text" name="first_name" placeholder="First name" />
                <input id="reg_lastname" onkeyup='saveValue(this)' class="text-input" type="text" name="last_name" placeholder="Last name" />
                <input id="reg_email" onkeyup='saveValue(this)' class="text-input" type="email" name="email" placeholder="E-mail" />
                <input id="reg_country" onkeyup='saveValue(this)' class="text-input" type="text" name="country" placeholder="Country" />
                <input id="reg_city" onkeyup='saveValue(this)' class="text-input" type="text" name="city" placeholder="City" />
                <input id="reg_address" onkeyup='saveValue(this)' class="text-input" type="text" name="address" placeholder="Address" />
                <input class="text-input" type="password" name="pwd" placeholder="Password" />
                <input class="text-input" type="password" name="pwdrepeat" placeholder="Repeat Password" />
                <button type="submit" name="submit">REGISTER</button>
            </div>
        </form>
    </div>
    <h3>Or</h3>
    <div class="login-card">
        <!-- Login -->
        <p>Login</p>
        <form class="login-form" action="includes/auth/login.php" method="post">
            <input id="login_email" onkeyup='saveValue(this)' class="text-input" type="email" name="email" placeholder="E-mail" />
            <input class="text-input" type="password" name="pwd" placeholder="Password" />
            <button type="submit" name="submit">LOGIN</button>
        </form>
    </div>
</div>