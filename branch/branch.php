<?php 
    include "branch_header.php"; 
    include "branch_navigation.php";
?>

<!-- Main Body ------------------------------------------------------------------------------------------------------->

    <section class="container-fluid custom-main-wrapper col-md-12 overflow-y-scroll">

        <!-- Main Layout -->
        <div class="container">
            <div class="d-flex my-3">

                <!-- Sidebar --------------------------------------------------------------------------------->

                <?php include "branch_sidebar.php"; ?>

                <!-- Item Browser ---------------------------------------------------------------------------->

                <div class="content ms-3 flex-fill">

                    <!-- Search / Category Navigation -->
                    <div class="card shadow p-0 bg-body-tertiary rounded border-0 mb-3">
                        <div class="input-group input-group-sm border-0">
                            <p class=" fw-bold border-start border-3 border-success px-4 ms-3 my-3 me-5">
                                Point of Sale
                            </p>

                            <input type="text" class="form-control rounded-start my-2 ms-3" placeholder="Search..." aria-describedby="search-button-product">

                            <button class="btn btn-sm rounded-end border px-3 my-2 me-3" type="submit" id="search-button-product">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="card card shadow p-3 bg-body-tertiary rounded border-0">
                        <div class="input-group input-group-sm border-0 align-content-center">
                            <p class=" fw-bold border-start border-3 border-success px-4 me-5 align-content-center">
                                Products
                            </p>

                            <form action="" class="form-control border-0 d-flex bg-body-tertiary" method="post">
                                <select class="form-select rounded mb-3 ms-5 me-3" name="item-category" id="item-category">
                                    <option selected>-- Select Category --</option>
                                    <option value="sample">Sample Category</option>
                                </select>

                                <button class="btn btn-secondary mb-3 rounded" type="submit">Search</button>
                            </form>
                            
                        </div>

                        <div id="table-data">
                            <!-- Content displayed and handled by transaction.dashboard.php ----->
                        </div>
                    </div>
                </div>
                
                <!-- Cart and Payment -------------------------------------------------------------------------->

                <div class="card shadow p-3 bg-body-tertiary rounded border-0 ms-3 custom-cart-payment">
                    <div class="d-flex justify-content-between">
                        <p class=" fw-bold border-start border-3 border-success px-4 me-5 mb-0">
                            Item Cart
                        </p>
                        <span class="badge bg-secondary p-2">Reset</span>
                    </div>
                    
                    <!-- Item list on Cart-->
                    <div class="card p-2 mt-3 rounded border-0">
                        <table class="table table-borderless">
                            <tr>
                                <th class="align-content-center">
                                    <small><span class="text-muted">Item/s</span></small>
                                </th>
                                <th class="align-content-center">
                                    <small><span class="text-muted">Qty.</span></small>
                                </th>
                                <th class="align-content-center">
                                    <small><span class="text-muted">Amount</span></small>
                                </th>
                            </tr>
                            <tr>
                                <td class="align-content-center">
                                    <small><span>Product Name</span></small>
                                </td>
                                <td class="align-content-center">
                                    <button class="btn px-2 border" type="button">-</button>
                                    <small><span>1</span></small>
                                    <button class="btn px-2 border" type="button">+</button>
                                </td>
                                <td class="align-content-center">
                                    <small><span>₱ 00.00</span></small>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Payment Calculation and Receipt -->
                    <div class="mt-3">
                        <!-- Total Payables -->
                        <div class="d-flex align-content-center rounded p-2 custom-total mb-2">
                            <span class="py-0 flex-fill fs-4 text-white">Total:</span>
                            <span class="fw-bold flex-fill fs-4 ms-0 ps-0 text-end text-white">₱ 00.00</span>
                        </div>

                        <!-- Cash Received -->
                        <div class="input-group align-content-center">
                            <label class="form-label text-muted me-5 ps-2 py-0" for="cash-input">Cash Received:</label>
                            <input class="form-control rounded p-0 mb-2 text-end" placeholder="₱ 00.00" id="cash-input" type="number" min="0" step="0.01">
                        </div>

                        <!-- Cash Change -->
                        <div class="d-flex justify-content-between">
                            <span class="text-muted ps-2">Change:</span>
                            <span class="text-muted text-end pe-2 mb-3">₱ 00.00</span>
                        </div>

                        <!-- Digit Inputs -->
                        <div class="justify-content-center">
                            <div class="btn-group">
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">7</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">8</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">9</span>
                                </button>
                            </div> 
                            <div class="btn-group">
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">4</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">5</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">6</span>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">1</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">2</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">3</span>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">.</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">0</span>
                                </button>
                                <button class="btn shadow rounded border-0 custom-calc-btn">
                                    <span class="fs-5">Del</span>
                                </button>
                            </div>
                        </div> 
                        

                        <div class="d-flex mt-3">
                            <button class="btn flex-fill rounded border-1 custom-receipt-btn p-2 fs-4" type="submit" id="receipt-submit">
                                Save Order
                            </button>
                        </div>
                        
                    </div>                            
                </div>             
            </div>
        </div>
    </section>

<!-- Footer --------------------------------------------------------------------------------------------------------->

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

    <script src="js/pos/product_pagination.branch.js"></script>

<?php include "branch_footer.php"; ?>