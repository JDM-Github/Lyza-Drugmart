<?php
    // Connect to your MySQL database
    include "../../includes/dbh.inc.php";

    // Handle AJAX request to fetch paginated data
    if (isset($_POST['page'])) {
        $limit = 6;  // Number of rows per page
        $page = $_POST['page'];
        $start = ($page - 1) * $limit;

        // Query to fetch limited data
        $query = "SELECT product_name, category, branch_name, qty, total_amount,
            transaction_date, staff_acc, cash_received, cash_change
            FROM transactions LIMIT $start, $limit";
        $result = $dbconn->query($query);

        // Fetch the total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM transactions";
        $countResult = $dbconn->query($countQuery);
        $totalRecords = $countResult->fetch_assoc()['total'];

//-- Output Transaction Table --------------------------------------------------------------------------------------------------

        echo    '<table class="table table-sm table-hover">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 
                    "<tr>
                        <td class='align-content-center ps-4'>
                            <small><span class='text-muted'>Branch</span></small><br>
                            <span class='fw-bold'>{$row['branch_name']}</span>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='badge text-bg-secondary'>{$row['category']}</span></small><br>
                            <small><span class='fw-bold'>{$row['product_name']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='fw-bold'>x{$row['qty']}&nbsp;pc/s.</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>Total</span></small><br>
                            <small><span class='fw-bold'>₱&nbsp;{$row['total_amount']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>Cash</span></small><br>
                            <small><span class='text-muted'><strong>₱&nbsp;{$row['cash_received']}</strong></span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>Change</span></small><br>
                            <small><span class='text-muted'>₱&nbsp;{$row['cash_change']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small>{$row['transaction_date']}</small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>Staff</span></small><br>
                            <span class='text-muted'>{$row['staff_acc']}</span>
                        </td>
                        <td class='align-content-center pe-4'>
                            <a class='link-offset-2 link-underline link-underline-opacity-0 d-flex' href='#' id='print-modal'>
                                <small><i class='bi bi-printer-fill fw-bolder fs-4 text-secondary'></i></small>
                            </a>
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

        echo    '<nav>';
        echo        '<ul class="pagination custom-pagination">';

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