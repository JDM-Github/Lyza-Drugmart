<?php 
    include_once "includes/dbh.inc.php"; 
    include "index_header.php";
    include "index_navigation.php";
?>

<section class="overflow-y-scroll">

<!-- Banner ------------------------------------------------------------------------------------------------------------>

    <div class="banner-home">
        <img src="img/SamplePhoto.jpg">
        <div class="container banner-text mt-3">

            <!----- Banner Title/Label ----->
            <div class="my-5">
                <h2 class="fw-bold display-4 text-center">Lyza Drugmart</h2>
                <p class="text-light text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>

            <!----- Search Bar ----->
            <div class="card shadow p-0 bg-body-tertiary rounded-pill border-0">
                <div class="input-group input-group-lg rounded-pill border-0">
                    <input type="text" id="search-input" class="form-control rounded-start-pill display-5" placeholder="Search..." aria-describedby="search-button-home">
                    <button class="btn rounded-end-circle custom-btn-success" type="button" id="search-button-home">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

        </div>            
    </div>

<!-- Content ------------------------------------------------------------------------------------------------------------>

    <div class="container">

        <!----- Product Categories ----->
        <h2 class=" fw-bold fs-3 border-start border-3 border-success px-4">
            Explore our Available Products
        </h2>
        <ul class="nav nav-pills mb-3 custom-pills">     
            <li class="nav-item">
                <a class="nav-link category-pill active" data-category="All">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Medicine">Medicine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Supplement">Supplement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Hygiene">Hygiene</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Contraceptive">Contraceptive</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Baby Care">Baby Care</a>
            </li>
            <li class="nav-item">
                <a class="nav-link category-pill" data-category="Other">Other</a>
            </li>
        </ul>

        <!----- Product Grid Display ----->
        <div class="row g-3 mb-3" id="product-grid">

            <!-- Cards will be dynamically inserted here after Category Click -->

            <?php

            $query = "SELECT * FROM products";
            $result = mysqli_query($dbconn,$query);

            while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-3">

                    <!----- Product Display Placeholder for Initial Page Loading ----->
                    <div class="card shadow bg-body-tertiary rounded border-0">

                        <img class="card-image rounded" src="img/<?php echo $row['image_path']; ?>" height="250" width="auto" alt="<?php echo $row['product_name']; ?>">

                        <div class="card-body">
                            <span class="badge text-bg-secondary p-1 mb-1"><?php echo $row['category']; ?></span>
                            <p class="m-0"><?php echo $row['product_name']; ?></p>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold m-0">₱<?php echo $row['price']; ?></p>
                                <p class="m-0"><?php echo $row['stock']; ?> item/s</p>
                            </div>
                        </div>
                    </div>                                        
                </div>
            <?php endwhile;
            ?>
        </div>
    </div>

</section>

<!-- Banner-Foot --------------------------------------------------------------------------------------------------------->

    <footer class="banner-foot pt-2">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-content-center">
                <img src="img/LyzaVectorLogoWhite.png" class="img rounded me-4" alt="Lyza Drugmart" width="30" height="30">
                <p class="text-white p-1"><small>Copyright © 2024 Lyza Drugmart. All Rights Reserved.</small></p>
            </div>
             
            <div class="d-flex p-1">
                <p class="text-white">
                    <small>
                        Contact us at <span class="badge m-0 text-bg-light text-success">09XX-XXX-XXXX</span>
                    </small>
                </p>&nbsp;
                <i class="bi bi-facebook text-white"></i>&nbsp;
                <i class="bi bi-instagram text-white"></i>
            </div> 
        </div>           
    </footer>

<?php include "index_footer.php"; ?>

    