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
    
    /*---------- Banner-Foot ----------*/
    .custom-branch-footer {
        position: relative;  /* Make it a positioned element */
        width: 100%;
        height: 500px;
        overflow: hidden;  /* Ensures content doesn't overflow out of div */
        border: 0;
        background-color: var(--green);
    }
    .custom-branch-footer a:hover {
        font-weight: bold;
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

    /*---------- Content Body (Sidebar and Main) ----------*/
    
    /*---------- Sidebar ----------*/
    #sidebar {
        width: 75px;
    }
    .custom-link-hover a {
        color: black;
    }
    .custom-link-hover a:hover {
        color: white;
        background-color: #56ab91;
        border-radius: 5px;
        font-weight: bold;
    }

    /*---------- Card Figures ----------*/
    .custom-success-bg {
        background-color: var(--green);
    }
    .custom-warning-bg {
        background-color: var(--base);
    }
    .custom-warning-bg h2, .custom-warning-bg i, .custom-warning-bg p{
        color: var(--red);
    }
    .custom-danger-bg {
        background-color: var(--red);
    }
    .custom-success2-bg {
        background-color: var(--base);
    }
    .custom-success2-bg h2, .custom-success2-bg i, .custom-success2-bg p{
        color: var(--green);
    }

    /*---------- Pagination ----------*/
    .pagination .page-item .page-link {
        border-radius: 10px;
        margin-right: 15px;
        color: black; /* Set text color */
    }
    .pagination .page-item.active .page-link {
        background-color: var(--green);
        border-color: var(--green);
        color: var(--base);
    }

    /*---------- Cart and Calculator ----------*/
    .custom-cart-payment {
        width: 315px;
    }
    .custom-total {
        background-color: var(--dark);
    }
    .custom-calc-btn {
        width: 95px;
        height: 60px;
    }
    .custom-calc-btn:hover {
        background-color: var(--green);
        color: var(--base);
        font-weight: bold;
    }
    .custom-receipt-btn {
        background-color: var(--base);
        border-color: var(--green);
        color:var(--green);
    }
    .custom-receipt-btn:hover {
        background-color: var(--green);
        color: var(--base);
    }

    /*---------- Footer ----------*/
    footer {
        display: grid;
    }

</style>