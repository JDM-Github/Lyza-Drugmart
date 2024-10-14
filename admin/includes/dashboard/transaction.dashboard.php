<?php

    // Connect to your MySQL database
    include "../../includes/dbh.inc.php";

    // Handle AJAX request to fetch paginated data
    if (isset($_POST['page'])) {
        $limit = 5;  // Number of rows per page
        $page = $_POST['page'];
        $start = ($page - 1) * $limit;

        // Query to fetch limited data
        $query = "SELECT id, product_name, category, branch_name, qty, total_amount, transaction_date,
            staff_acc, cash_received, cash_change
            FROM transactions 
            ORDER BY transaction_date DESC
            LIMIT $start, $limit";
        $result = $dbconn->query($query);

        // Fetch the total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM transactions";
        $countResult = $dbconn->query($countQuery);
        $totalRecords = $countResult->fetch_assoc()['total'];

        echo    '<table class="table table-sm table-hover">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Generate a unique ID for each modal
                $modalId = 'details-modal-' . $row['id'];

                echo 
                    "<tr>
                        <td class='justify-content-start ps-4'>
                            <small>
                                <span class='badge text-bg-secondary'>
                                    <i class='bi bi-house-door-fill me-1'></i>{$row['branch_name']}
                                </span>
                            </small><br>
                            <small><span class='text-muted fw-bolder'>{$row['product_name']}</span></small>
                        </td>
                        <td class='justify-content-start'>
                            <small><span class='text-muted'>Amount</span></small><br>
                            <small><span class='text-muted fw-bolder'>₱ {$row['total_amount']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small>{$row['transaction_date']}</small>
                        </td>
                        <td class='align-content-center'>
                            <!-- Details Modal Trigger -----> 
                            <a class='link-offset-2 link-underline link-underline-opacity-0 d-flex' href='#' id='details-modal' data-bs-toggle='modal' data-bs-target='#$modalId'>
                                <small><i class='bi bi-three-dots fs-4 text-secondary'></i></small>
                            </a>

                            <!-- Details Modal -----> 
                            <div class='modal fade shadow border-0' id='$modalId' tabindex='-1' aria-labelledby='{$modalId}-label' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <!------- Modal Header ----------> 
                                        <div class='modal-header border-0'>
                                            <h1 class='modal-title fs-5' id='{$modalId}-label'></h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>

                                        <!------- Modal Body ----------> 
                                        <div class='modal-body px-5'>
                                            <span class='text-muted fw-bold'>{$row['branch_name']} Branch</span><br>
                                            <span class='text-muted'>Timestamp: {$row['transaction_date']}</span><br>
                                            <span class='text-muted'>Account: {$row['staff_acc']}</span><br><br>

                                            <span class='text-muted fw-bolder text-end'>{$row['product_name']}</span>
                                            <div class='d-flex justify-content-between'>
                                                <small><span class='text-muted'>Category :</span></small>
                                                <span class='text-muted text-end'>{$row['category']}</span></small>
                                            </div> 
                                            <div class='d-flex justify-content-between'>
                                                <small><span class='text-muted'>No. of Item/s :</span></small>
                                                <span class='text-muted text-end'>x{$row['qty']}</span></small>
                                            </div>

                                            <div class='justify-content-center'>
                                                <small>
                                                    <span class='text-muted'>
                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                                                    </span>
                                                </small>
                                            </div>
                                             

                                            <div class='d-flex justify-content-between'>
                                                <small><span class='text-muted'>Total Amount Payable    :</span></small>
                                                <span class='text-muted fw-bolder text-end'>₱ {$row['total_amount']}</span></small>
                                            </div> 
                                            
                                            <div class='justify-content-center'>
                                                <small>
                                                    <span class='text-muted'>
                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                                                    </span>
                                                </small>
                                            </div> 

                                            <div class='d-flex justify-content-between'>
                                                <small><span class='text-muted'>Cash received:</span></small>
                                                <span class='text-muted text-end'>₱ {$row['cash_received']}</span></small>
                                            </div> 
                                            <div class='d-flex justify-content-between mb-3'>
                                                <small><span class='text-muted'>Change :</span></small>
                                                <span class='text-muted fw-bolder text-end'>₱ {$row['cash_change']}</span></small>
                                            </div> 
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>";
            }
        } else {
            echo    "<tr>
                        <td colspan='5'>No records found.</td>
                    </tr>";
        }

        echo '</table>';
        
        // Pagination logic (no changes here)
        $totalPages = ceil($totalRecords / $limit);

        echo    '<nav>';
        echo        '<ul class="pagination custom-pagination">';

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

        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $page) ? 'active' : '';
            echo        "<li class='page-item $activeClass'>
                            <a class='page-link' href='#' data-page='$i'>$i</a>
                        </li>";
        }

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
