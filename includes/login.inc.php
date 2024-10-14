
<h1 class="text-center">Log In</h1>
<form class="form-control border-0" action="login.inc.php" method="post">

    <!----- Email Input ----->
    <div class="form-floating mb-2">
        <input type="email" name="email" id="email" class="form-control" placeholder="sample@email.com" required>
        <label for="email" id="email-label"><em>Email Address</em></label>
    </div>
    
    <!----- Password Input ----->
    <div class="form-floating">
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
        <label for="pass" id="pass-label"><em>Password</em></label>
    </div>
        
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="" id="show-password" onclick="togglePassword()">
        <label class="form-check-label text-muted" for="show-password">
            Show Password
        </label>
    </div>
 
    <div class="d-grid">
        <button class="btn custom-login-btn" name="login" type="submit">LOGIN</button>
    </div>
</form>