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
                                Transaction Report
                            </p>
                        </div>

                        <!-- Transactions Table ----->
                        <div class="card shadow p-3 bg-body-tertiary rounded border-0">
                            <div class="input-group input-group-sm border-0 align-content-center">
                                <p class="fw-bold border-start border-3 border-success px-4 mb-3 me-5 align-content-center">
                                    Filter
                                </p>

                                <!-- Data Filtering -->
                                <form id="filter-form" class="form-control border-0 d-flex bg-body-tertiary">
                                    <select class="form-select rounded mb-3 mx-3" name="branch" id="branch">
                                        <option selected>-- Select Branch --</option>
                                        <option value="San Miguel">San Miguel</option>
                                        <option value="San Isidro Norte">San Isidro Norte</option>
                                    </select>

                                    <select class="form-select rounded mb-3 me-3" name="category" id="category">
                                        <option selected>-- Select Category --</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Supplement">Supplement</option>
                                        <option value="Hygiene">Hygiene</option>
                                        <option value="Contraceptive">Contraceptive</option>
                                        <option value="Baby Care">Baby Care</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    <input class="form-control rounded mb-3 me-3" type="date" name="date" id="date">

                                    <button class="btn btn-secondary mb-3 rounded" type="submit">Search</button>
                                </form>
                                
                            </div>
                            
                            <div id="table-data">
                                <!-- Content displayed and handled by transaction.report.php ----->
                            </div>

                            <script>
                                $(document).ready(function () {
                                    // Handle form submission
                                    $('#filter-form').on('submit', function (e) {
                                        e.preventDefault(); // Prevent default form submission
                                        
                                        // Get form values
                                        var branch = $('#branch').val();
                                        var category = $('#category').val();
                                        var date = $('#date').val();
                                        
                                        // Send AJAX request
                                        $.ajax({
                                            url: 'includes/report/transaction.report.php',
                                            method: 'POST',
                                            data: {
                                                branch: branch,
                                                category: category,
                                                date: date,
                                                page: 1 // Start at page 1 for new filters
                                            },
                                            success: function (response) {
                                                // Update the table data with the filtered results
                                                $('#table-data').html(response);
                                            }
                                        });
                                    });
                                });
                            </script>
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

    <!-- Transaction Pagination -->
    <script src="js/report/transaction_pagination.js"></script> 

<?php include "admin_footer.php"; ?>

