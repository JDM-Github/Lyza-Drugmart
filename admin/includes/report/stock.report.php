<?php
    // Connect to your MySQL database
    include "../../includes/dbh.inc.php";

    // Handle AJAX request to fetch paginated data
    if (isset($_POST['page'])) {
        $limit = 5;  // Number of rows per page
        $page = $_POST['page'];
        $start = ($page - 1) * $limit;

        // Query to fetch limited data
        $query = "SELECT product_name, branch_name,
            added_amount, restock_date, staff_acc
            FROM restocking LIMIT $start, $limit";
        $result = $dbconn->query($query);

        // Fetch the total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM restocking";
        $countResult = $dbconn->query($countQuery);
        $totalRecords = $countResult->fetch_assoc()['total'];

//-- Output Transaction Table --------------------------------------------------------------------------------------------------

        echo    '<table class="table table-sm table-hover">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 
                    "<tr>
                        <td class='justify-content-center ps-4'>
                            <span class='text-muted fw-bold'>{$row['branch_name']}</span>
                        </td>
                        <td class='justify-content-center'>
                            <span class='text-muted fw-bold'>{$row['product_name']}</span>
                        </td>
                        <td class='justify-content-center'>
                            <span class='text-muted fw-bold'>{$row['added_amount']}</span>
                        </td>    
                        <td class='justify-content-center'>
                            <span class='text-muted fw-bold'>{$row['restock_date']}</span>
                        </td>        
                        <td class='justify-content-center'>
                            <span class='text-muted fw-bold'>{$row['staff_acc']}</span>
                        </td>            
                    </tr>";
            }
        } else {
            echo    "<tr>
                        <td colspan='5'>No records found.</td>
                    </tr>";
        }
        echo '</table>';

//-- Pagination ------------------------------------------------------------------------------------------------------------------

        // Pagination Logic
        $totalPages = ceil($totalRecords / $limit);

        echo    '<nav class="justify-content-end">';
        echo        '<ul class="pagination">';

        // Previous Button
        if ($page > 1) {
            echo        "<li class='page-item'>
                            <a class='page-link' href='#' data-page='" . ($page - 1) . "'>
                                <i class='bi bi-arrow-left'></i>
                            </a>
                        </li>";
        } else {
            echo        "<li class='page-item disabled'>
                            <a class='page-link' href='#'>
                                <i class='bi bi-arrow-left'></i>
                            </a>
                        </li>";
        }

        // Page numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $page) ? 'active' : '';
            echo        "<li class='page-item $activeClass'>
                            <a class='page-link' href='#' data-page='$i'>$i</a>
                        </li>";
        }

        // Next Button
        if ($page < $totalPages) {
            echo        "<li class='page-item'>
                            <a class='page-link' href='#' data-page='" . ($page + 1) . "'>
                                <i class='bi bi-arrow-right'></i>
                            </a>
                        </li>";
        } else {
            echo        "<li class='page-item disabled'>
                            <a class='page-link' href='#'>
                                <i class='bi bi-arrow-right'></i>
                            </a>
                        </li>";
        }

        echo        '</ul>';
        echo    '</nav>';
        exit();
    }
?>