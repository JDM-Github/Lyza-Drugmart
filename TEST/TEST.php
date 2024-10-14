<?php
echo "PHP is working!";
?>

<div class="card shadow p-3 bg-body-tertiary rounded border-0">

    <?php 
        include "includes/dbh.inc.php";
        include "includes/fetch_data.inc.php";
    ?>
    
    <!-- Transaction table -->
    <table class="table table-hover table-borderless mb-3">
        <thead>
            <tr>
                <th><small>Product</small></th>
                <th><small>Category</small></th>
                <th><small>Branch</small></th>
                <th><small>No. of Items</small></th>
                <th><small>Total Amount</small></th>
                <th><small>Cash Received</small></th>
                <th><small>Change</small></th>
                <th><small>Date</small></th>
                <th><small>Staff</small></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output Data per Row
                while ($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>
                            <td>" . $row["product_name"] . "</td>
                            <td>" . $row["category"] . "</td>
                            <td>" . $row["branch_name"] . "</td>
                            <td>" . $row["qty"] . " item/s</td>
                            <td>₱" . $row["total_amount"] . "</td>
                            <td>₱" . $row["cash_received"] . "</td>
                            <td>₱" . $row["cash_change"] . "</td>
                            <td>" . $row["transaction_date"] . "</td>
                            <td>" . $row["staff_acc"] . "</td>
                        </tr>"
                    ;
                }
            } else {
                echo 
                    "<tr>
                        <td colspan='9'>No products found</td>
                    </tr>"
                ;
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-end ">
        <?php
            // Previous button if not in the First page
            if ($page > 1) {
                echo 
                    "<li class='page-item'>
                        <a class='page-link' href='?page=" . ($page - 1) . "'>
                            <i class='bi bi-arrow-left'></i>
                        </a>
                    </li>"
                ;
            }

            // Loop through Page Numbers
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo 
                        "<li class='page-item active'>
                            <a class='page-link' href='?page=$i'>$i</a>
                        </li>"
                    ;
                } else {
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='?page=$i'>$i</a>
                        </li>"
                    ;
                }
            }

            // Display Next button if not on the Last page
            if ($page < $total_pages) {
                echo 
                    "<li class='page-item'>
                        <a class='page-link' href='?page=" . ($page + 1) . "'>
                            <i class='bi bi-arrow-right'></i>
                        </a>
                    </li>"
                ;
            }
        ?>
        </ul>
    </nav>
</div>
    