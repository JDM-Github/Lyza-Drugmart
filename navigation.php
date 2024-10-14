<!----- Navigation | Home Page ----->
<div class="custom-nav-header">
    <div class="container align-items-bottom d-flex justify-content-between pt-1">
        <div class="d-flex">
            <i class="bi bi-facebook text-white"></i>&nbsp;
            <i class="bi bi-instagram text-white"></i>
        </div>
        <p class="text-white">
            <small>
                Contact us at <span class="badge m-0 text-bg-light text-success">09XX-XXX-XXXX</span>
            </small>
        </p>
    </div>
</div>

<nav class="navbar custom-navbar" id="navbar">
    <div class="container">
        <div class="d-inline-flex align-items-center custom-logo-label">
            <img class="me-2 p-0" src="img/LyzaVectorLogo.png" alt="Lyza Drugmart" width="35" height="30">
            <h2 class=" fw-bold fs-4">Lyza Drugmart</h2>
        </div>
        
        <!----- Toggle Offcanvass | Login Form ----->
        <button class="btn p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#login-form-offcanvass" aria-controls="login-form-offcanvass">LOG IN</button>
    </div>
</nav>

<!----- Offcanvass Body | Login Form ----->
<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="login-form-offcanvass" aria-labelledby="login-form-label">

    <div class="offcanvas-header">
        <!----- Close Form ----->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <!----- Login Form Body ----->
    <div class="offcanvas-body">
        <?php
            include "includes/login.inc.php";
        ?>
    </div>
</div>