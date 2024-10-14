<?php 
    include "branch_header.php"; 
    include "branch_navigation.php";
?>

<!-- Main Body -------------------------------------------------------------------------------------------------------------->

    <section class="container-fluid custom-main-wrapper col-md-12">

        <!-- Main Layout -->
        <div class="container">
            <div class="d-flex my-3">

                <!-- Sidebar -->
                <?php include "branch_sidebar.php"; ?>

                <!-- Item Browser ---------------------------------------------------------------------------->

                <div class="content ms-3 flex-fill">

                    <!-- Add New Product -->
                    <div class="card shadow p-3 bg-body-tertiary rounded border-0 mb-3 ">
                        <div class="d-flex justify-content-between align-content-center">
                            <p class="fw-bold border-start border-3 border-success px-4 my-1">
                                Branch Stock Status
                            </p>
                        </div>
                    </div>

                    <!-- Product Table-->
                    <div class="card card shadow p-3 bg-body-tertiary rounded border-0">
                        <div class="input-group input-group-sm border-0 align-content-center">
                            <p class=" fw-bold border-start border-3 border-success px-4 mb-3 me-5 align-content-center">
                                Filter
                            </p>

                            <form action="" class="form-control border-0 d-flex bg-body-tertiary" method="post">
                                <select class="form-select rounded mb-3 me-3" name="item-category" id="item-category">
                                    <option selected>-- Select Category --</option>
                                    <option value="sample">Sample Category</option>
                                </select>

                                <select class="form-select rounded mb-3 me-3" name="item-category" id="item-status">
                                    <option selected>-- Select Status --</option>
                                    <option value="sample">Good</option>
                                    <option value="sample">Critical</option>
                                    <option value="sample">Out of Stock</option>
                                </select>

                                <button class="btn btn-secondary mb-3 rounded" type="submit">Search</button>
                            </form>
                            
                        </div>
                            
                        <div id="table-data">
                            <!-- Content displayed and handled dynamically ----->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Footer ---------------------------------------------------------------------------------------------------------------->

    <footer class="text-center pt-2 custom-branch-footer">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-content-center">
                <img src="../img/LyzaVectorLogoWhite.png" class="img rounded me-4" alt="Lyza Drugmart" width="30" height="30">
                <p class="text-white p-1"><small>Copyright © 2024 Lyza Drugmart. All Rights Reserved.</small></p>
            </div>
            <div class="d-flex p-1">
                <!----- Point of Sale ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-flex justify-content-center text-white ps-4" href="branch.php" id="pos-tab">
                    Point of Sale
                </a>

                <!----- Transactions ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-flex justify-content-center text-white ps-4" href="branch_transaction.php" id="transaction-branch-tab">
                    Transactions
                </a>

                <!----- Products ----->
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-flex justify-content-center text-white ps-4" href="branch_stock.php" id="stock-branch-tab">
                    Products
                </a>
            </div>
        </div>
    </footer>

    <script src="js/stock/stock_pagination.branch.js"></script>

<?php include "branch_footer.php"; ?>