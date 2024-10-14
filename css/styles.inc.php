<style>    
    
    :root {
        --green: #56ab91;
        --red: #EE6055;
        --base: #f2f2f2;
        --dark: #6c757d;
    }
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Montserrat", sans-serif;
        background-color: var(--base);
        height: 80dvh;
        overflow: hidden;
        display: grid;
        grid-template-rows: auto 1fr auto;
    }
    section {
        min-height: 80dvh;
    }

    /*---------- Banner-Home ----------*/
    .banner-home {
        position: relative;  /* Make it a positioned element */
        width: 100%;
        height: 325px;
        overflow: hidden;  /* Content doesn't overflow */
        border-image: fill 0 linear-gradient(#0100, #f2f2f2);
    }
    .banner-home img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; 
        z-index: -1; /* Places the image behind the content */
    }
    .banner-text {
        position: relative; 
        color: white;
        z-index: 1; /* Place content above the image */
    }

    /*---------- Banner-Foot ----------*/
    .banner-foot {
        position: relative;  /* Make it a positioned element */
        width: 100%;
        height: 200px;
        overflow: hidden;  /* Content doesn't overflow */
        border: 0;
        background-color: var(--green);
    }

    /*---------- Navbar ----------*/
    .custom-nav-header {
        background-color: var(--green);
        width: 100%;
        height: 30px;
    }
    .custom-navbar {
        align-content: center;
        align-items: center;
        padding: 15px 0 15px;
    }
    .custom-logo-label h2 {
        text-align: center;
        align-items: center;
    }

    /*---------- Card ----------*/
    .card-image {
        width: 100%;
        height: auto;
    }

    /*---------- Navpill Customization ----------*/
    .custom-pills .nav-link {
        color: var(--dark); /* Inactive text color */
    }
    .custom-pills .nav-link.active {
        background-color: var(--green); /* Active background color */
        color: var(--base); /* Active text color */
        font-weight: bold;
        border: 0; /* Active border */
        border-radius: 20px;
    }
    .custom-pills .nav-link:hover {
        cursor: pointer;
        font-weight: bold;
        background-color: var(--base); /* Hover background color */
        color: var(--green); /* Hover text color */
    }

    /*---------- Login ----------*/
    .custom-login-btn {
        background-color: var(--dark);
        color: var(--base);
    }
    .custom-login-btn:hover {
        background-color: var(--green);
        color: var(--base);
        font-weight: bolder;
    }

    /*---------- Custom Buttons ----------*/
    .custom-btn-success {
        background-color: var(--green);
        color: var(--base);
        border: 0;
    }
    .custom-btn-success:hover {
        color: var(--green);
        font-weight: bold;
        border: 0;
    }
    .custom-btn-danger {
        background-color: var(--red);
        color: var(--base);
        border: 0;
    }
    .custom-btn-danger:hover {
        color: var(--red);
        font-weight: bold;
        border: 0;
    }
    .custom-btn-secondary {
        background-color: var(--dark);
        color: var(--base);
        border: 0;
    }
    .custom-btn-secondary:hover {
        color: var(--dark);
        font-weight: bold;
        border: 0;
    }

</style>