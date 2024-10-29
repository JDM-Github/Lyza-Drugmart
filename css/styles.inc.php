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
        min-height: 85dvh;
    }

    /*---------- Banner-Home ----------*/
    .banner-home {
        position: relative;
        /* Make it a positioned element */
        width: 100%;
        height: 340px;
        top: 0;
        border-image: fill 0 linear-gradient(#0100, #f2f2f2);
    }

    .banner-home img {
        position: absolute;
        top: -50px;
        left: 0;
        width: 100%;
        height: 113%;
        object-fit: cover;
        z-index: -1;
        /* Places the image behind the content */
    }

    .banner-text {
        position: relative;
        color: white;
        z-index: 1;
        /* Place content above the image */
    }

    /*---------- Banner-Foot ----------*/
    .banner-foot {
        position: relative;
        /* Make it a positioned element */
        width: 100%;
        height: 200px;
        overflow: hidden;
        /* Content doesn't overflow */
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
        color: var(--dark);
        /* Inactive text color */
    }

    .custom-pills .nav-link.active {
        background-color: var(--green);
        /* Active background color */
        color: var(--base);
        /* Active text color */
        font-weight: bold;
        border-radius: 20px;
    }

    .custom-pills .nav-link:hover {
        cursor: pointer;
        font-weight: bold;
        border-radius: 20px;
        color: white;
        /* Hover text color */
    }

    /*---------- Login ----------*/


    /*---------- Custom Buttons ----------*/
    .custom-btn-success {
        background-color: var(--green);
        color: var(--base);
        border: 0;
    }

    .custom-btn-success:hover {
        color: var(--green);
        background-color: var(--base);
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
        background-color: var(--base);
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
        background-color: var(--base);
        font-weight: bold;
        border: 0;
    }

    .custom-btn-white {
        background-color: var(--base);
        color: var(--green);
        border: 0;
    }

    .custom-btn-white:hover {
        color: var(--base);
        background-color: var(--dark);
        font-weight: bold;
        border: 0;
    }

    .custom-btn-border {
        background-color: var(--base);
        color: var(--green);
        border: 1px;
        border-color: var(--green);
    }

    .custom-btn-border:hover {
        color: var(--base);
        background-color: var(--green);
        font-weight: bold;
        border: 1px;
        border-color: var(--green);
    }

    /*---------- Branch Cards ----------*/
    .custom-card-branch {
        height: 20\50px;
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .custom-branch-text {
        width: 100%;
        height: 250px;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, #56ab91, rgba(255, 255, 255, 0));
    }
</style>