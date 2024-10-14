<?php
    // Connect to your MySQL database
    include "../../includes/dbh.inc.php";

    // Handle AJAX request to fetch paginated data
    if (isset($_POST['page'])) {
        $limit = 6;  // Number of rows per page
        $page = $_POST['page'];
        $start = ($page - 1) * $limit;

        // Query to fetch limited data
        $query = "SELECT product_name, price, stock, category, branch
            FROM products LIMIT $start, $limit";
        $result = $dbconn->query($query);

        // Fetch the total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM products";
        $countResult = $dbconn->query($countQuery);
        $totalRecords = $countResult->fetch_assoc()['total'];

//-- Output Products Table --------------------------------------------------------------------------------------------------

        echo    '<table class="table table-sm table-hover">';
        echo        '<tr >
                        <th class="ps-4">
                            <small>
                                <span class="fw-bold">Category</span>
                            </small>
                        </th>
                        <th>
                            <small>
                                <span class="fw-bold">Item</span>
                            </small>
                        </th>
                        <th>
                            <small>
                                <span class="fw-bold">Stock</span>
                            </small>
                        </th>
                        <th>
                            <small>
                                <span class="fw-bold">Status</span>
                            </small>
                        </th>
                        <th>
                            <small>
                                <span class="fw-bold">Price</span>
                            </small>
                        </th>
                        <th>
                            <small>
                                <span class="fw-bold">Action</span>
                            </small>
                        </th>
                    </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 
                    "<tr>
                        <td class='align-content-center ps-4'>
                            <small><span class='badge text-bg-secondary'>{$row['category']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <span>{$row['product_name']}</span>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='fw-bold'>x{$row['stock']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='badge text-bg-secondary'>Status</span></small>
                        </td>
                        <td class='align-content-center'>
                            <small><span class='fw-bold'>₱ {$row['price']}</span></small>
                        </td>
                        <td class='align-content-center'>
                            <button class='btn btn-sm btn-secondary rounded' type='button'>Restock</button>
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