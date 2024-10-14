<?php
    // Connect to your MySQL database
    include "../../includes/dbh.inc.php";

    // Handle AJAX request to fetch paginated data
    if (isset($_POST['page'])) {
        $limit = 2;  // Number of rows per page
        $page = $_POST['page'];
        $start = ($page - 1) * $limit;

        // Query to fetch limited data
        $query = "SELECT branch_id, staff_name, email, pass
            FROM staff LIMIT $start, $limit";
        $result = $dbconn->query($query);

        // Fetch the total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM staff";
        $countResult = $dbconn->query($countQuery);
        $totalRecords = $countResult->fetch_assoc()['total'];

//-- Output Transaction Table --------------------------------------------------------------------------------------------------

        echo    '<table class="table table-sm table-hover">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 
                    "<tr>
                        <td class='align-content-center ps-4'>
                            <small><span class='badge text-bg-secondary'>{$row['branch_id']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='fw-bold'>{$row['staff_name']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>{$row['email']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='text-muted'>{$row['pass']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <button class='btn custom-remove-btn p-1' type='button' href='#' id='delete-acc-modal'>
                                <small>
                                    <i class='bi bi-trash-fill me-2'></i></i><span>Remove</span>
                                </small>
                            </button>
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