<?php 
    include "includes/dbh.inc.php";

    // Row Limit per Page
    $limit = 4;

    // Get/Set Current Page Number
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    // Calculate the Starting limit
    $start_from = ($page-1) * $limit;

    // Fetching Data
    $sql = "SELECT product_name, category, branch_name, qty, total_amount,
    cash_received, cash_change, transaction_date, staff_acc
    FROM transactions LIMIT $start_from, $limit";
    $result = $dbconn->query($sql);

    // Generate the table rows dynamically
    $output = 
        '<table class="table table-hover table-borderless mb-3">
            <thead>
                <tr>
                    <th><small>Product</small></th>
                    <th><small>Branch</small></th>
                    <th><small>No. of Items</small></th>
                    <th><small>Total Amount</small></th>
                    <th><small>Date</small></th>
                </tr>
            </thead>
            <tbody>'
    ;

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= 
            '<tr>
                <td>' . $row["product_name"] . '</td>
                <td>' . $row["category"] . '</td>
                <td>' . $row["branch_name"] . '</td>
                <td>' . $row["qty"] . ' item/s</td>
                <td>₱' . $row["total_amount"] . '</td>
                <td>₱' . $row["cash_received"] . '</td>
                <td>₱' . $row["cash_change"] . '</td>
                <td>' . $row["transaction_date"] . '</td>
                <td>' . $row["staff_acc"] . '</td>
            </tr>'
        ;
    }
    } else {
        $output .= 
            '<tr>
                <td colspan="4">No products found</td>
            </tr>'
        ;
    }

    $output .= 
        '   </tbody>
        </table>'
    ;
    // Get total number of rows for pagination
    $sql_total = "SELECT COUNT(id) FROM transactions";
    $result_total = $dbconn->query($sql_total);
    $row_total = $result_total->fetch_row();
    $total_records = $row_total[0];

    // Calculate total pages
    $total_pages = ceil($total_records / $limit);


    // Pagination links
    $output .= 
        '<nav>
            <ul class="pagination justify-content-center">'
    ;
    for ($i = 1; $i <= $total_pages; $i++) {
        $output .= 
            '<li class="page-item">
                <a class="page-link" href="#" id="' . $i . '">' . $i . '</a>
            </li>'
        ;
    }
    $output .= 
        '   </ul>
        </nav>'
    ;

    echo $output;

    $dbconn->close();
?>
