<?php 
    include "admin_header.php"; 
    include "admin_navigation.php";
?>

<!-- Main Body -------------------------------------------------------------------------------------------------------------->

    <section class="container-fluid custom-main-wrapper col-md-12 overflow-y-scroll">
        <!-- Main Layout -->
        <div class="container">
            <div class="custom-content-wrapper my-3">

                <!-- Sidebar -->
                <?php include "admin_sidebar.php"; ?>

                <!-- Main Content -->
                <div class="content ms-3">
                    <div id="main-content">
                        <div class="card shadow p-0 bg-body-tertiary rounded border-0 mb-3">
                            <p class=" fw-bold border-start border-3 border-success px-4 m-3">
                                Stock Report
                            </p>
                        </div>

                        <div class="d-flex mb-3">
                            <?php include "includes/report/figure_rep.inc.php"?>
                        </div>

                        <!-- Product Status Table ----->
                        <div class="card shadow p-3 bg-body-tertiary rounded border-0">
                            <p class="fw-bold border-start border-3 border-success ps-4">
                                Stock History
                            </p>
                            
                            <div id="table-data">
                                <!-- Content displayed and handled dynamically ----->
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </section>

<!-- Footer ---------------------------------------------------------------------------------------------------------------->

    <footer class="text-center pt-2 custom-admin-footer">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-content-center">
                <img src="../img/LyzaVectorLogoWhite.png" class="img rounded me-4" alt="Lyza Drugmart" width="30" height="30">
                <p class="text-white p-1"><small>Copyright © 2024 Lyza Drugmart. All Rights Reserved.</small></p>
            </div>
            <div class="d-flex p-1">
                <!----- Dashboard ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 ps-4" href="admin.php" id="dashboard-tab">
                    <p class="text-white">Dashboard</p>
                </a> 
                <!----- Transactions ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 ps-4" href="admin_transaction_reports.php" id="transactions-tab">
                    <p class="text-white">Transactions</p>
                </a>
                <!----- Stock History ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 ps-4" href="admin_stock_reports.php" id="stocks-tab">
                    <p class="text-white">Stock</p>
                </a>
                <!----- Product Status ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 ps-4" href="admin_product_reports.php" id="products-tab">
                    <p class="text-white">Products</p>
                </a>
                <!----- Accounts ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 ps-4"  href="admin_accounts.php" id="accounts-tab">
                    <p class="text-white">Accounts</p>
                </a>
            </div>
        </div>
    </footer>

    <script>
        
        const ctx = document.getElementById('stockChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Overall Stock', 'Overall Demand'],
                    datasets: [{
                    label: 'Rate',
                    data: [12, 19],

                    backgroundColor: [
                        '#EE6055'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
    
    <!-- Stock Pagination -->
    <script src="js/report/stock.report.js"></script>
    

<?php include "admin_footer.php"; ?>
