<div class="row mt-3">
                <div class="col-md-12">

                    <!----- Product Display | label ----->
                    <h2 class="mt-5 fw-bold fs-4"><i class="bi bi-tags"></i> Explore our Available Products</h2>

                    <div class="col-md-12">
                        <div class="row">
                            <?php

                                $query = "SELECT * FROM products";
                                $result = mysqli_query($dbconn,$query);

                                while ($row = $result->fetch_assoc()): ?>
                                    <div class="col-3 col-sm-3">

                                        <!----- Product Display | Individual Card ----->
                                        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border-0">

                                            <img class="card-image" src="img/<?php echo $row['image_path']; ?>">

                                            <div class="row pb-0">
                                                <div class="col-12">
                                                    <span class="badge text-bg-success">Category</span>
                                                    <p class="m-0 p-0"><?php echo $row['name']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row py-0 my-0">
                                                <div class="col-6 col-sm-6 mb-0">
                                                    <p class="fw-bold fs-5 p-0 m-0">₱<?php echo $row['price']; ?></p>
                                                </div>
                                                <div class="col-6 col-sm-6 mt-0">
                                                    <p class="text-end fs-5 p-0 m-0"><?php echo $row['stock']; ?> Item/s</p>
                                                </div>
                                            </div>                                            
                                        </div>                                        
                                    </div>
                                <?php endwhile;

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

            <!----- Product Category ----->
            <div class="row mb-3">
                <div class="col-md-12">

                    <!----- Product Category | label ----->
                    <h2 class="mt-0 fw-bold fs-4"><i class="bi bi-collection"></i> Browse Products by Categories</h2>

                    <div class="col-md-12">

                        <!----- Product Categories ----->
                        <ul class="nav nav-pills mb-3" id="category-pills">
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link active text-center" id="all-tab" data-bs-toggle="pill" href="#category-pills" data-category="all">All</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="medicine-tab" data-bs-toggle="pill" href="#category-pills" data-category="Medicine">Medicine</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="supplement-tab" data-bs-toggle="pill" href="#category-pills" data-category="Supplement">Supplement</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="hygiene-tab" data-bs-toggle="pill" href="#category-pills" data-category="Hygiene">Hygiene</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="contraceptive-tab" data-bs-toggle="pill" href="#category-pills" data-category="Contraceptive">Contraceptive</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="baby-care-tab" data-bs-toggle="pill" href="#category-pills" data-category="Baby Care">Baby Care</a>
                            </li>
                            <li class="nav-item card shadow me-3 bg-body-tertiary rounded border-0">
                                <a class="nav-link" id="other-tab" data-bs-toggle="pill" href="#category-pills" data-category="Other">Other</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!----- Product Display ----->
            <div id="product-grid" class="row g-3 mb-5">
                <?php 
                    include "includes/fetch_product.inc.php";
                ?>
            </div>
        </div>

        ------------------------
        
        <!----- Product Categories ----->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="all" href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="medicine" href="#">Medicines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="supplement" href="#">Supplements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="hygiene" href="#">Hygiene Care</a>
            </li><li class="nav-item">
                <a class="nav-link" id="contraceptive" href="#">Contraceptives</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="baby-care" href="#">Baby Essentials</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="other" href="#">Others</a>
            </li>
        </ul>

        <!----- Product Grid Display ----->
        <div class="row" id="product-grid">
            <!-- Cards will be dynamically inserted here -->
        </div>
        <div id="pagination">
            <!-- Pagination buttons will appear here -->
        </div>
 ------------------------------------------------
 document.getElementById('dashboard-tab').addEventListener('click', function() {
            document.getElementById('main-content').innerHTML = `
                <h2>Dashboard</h2>
                <p>This is the dashboard content.</p>
                <div class="dashboard-stats">
                    <p>Stat 1: 100</p>
                    <p>Stat 2: 200</p>
                </div>`;
        });

        document.getElementById('reports-tab').addEventListener('click', function() {
            document.getElementById('main-content').innerHTML = `
                <h2>Reports</h2>
                <p>This is the reports content.</p>
                <table class="report-table">
                    <tr><th>Date</th><th>Sales</th></tr>
                    <tr><td>2024-01-01</td><td>$100</td></tr>
                </table>`;
        });

        document.getElementById('accounts-tab').addEventListener('click', function() {
            document.getElementById('main-content').innerHTML = `
                <h2>Accounts</h2>
                <p>This is the accounts content.</p>
                <div class="account-list">
                    <p>User 1: Active</p>
                    <p>User 2: Inactive</p>
                </div>`;
        });

_______________________________________

<?php include "includes/dbh.inc.php" ?>
    <div class="row">
        <form method="post" action="admin_dashboard.php">

            <!-- Branch Filter ------>
            <div class="col-md-3">
                <label>Choose Branch</label>
                <select name="branch" id="branch" class="form-control">
                    <option active>-- Select Branch --</option>
                    <?php
                        $query = "SELECT * FROM branches";
                        $result = mysqli_query($dbconn, $query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['id'] ?>">
                                    <?php echo $row['location'] ?>
                                </option>
                            <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                
            </div>

            <div class="col-md-3">
                
            </div>

        </form>
    </div>


