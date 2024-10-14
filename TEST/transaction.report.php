<?php
// Connect to your MySQL database
include "../../includes/dbh.inc.php";

// Initialize filters with null values if not set
$branch = isset($_POST['branch']) && $_POST['branch'] !== '-- Select Branch --' ? $_POST['branch'] : null;
$category = isset($_POST['category']) && $_POST['category'] !== '-- Select Category --' ? $_POST['category'] : null;
$date = isset($_POST['date']) && $_POST['date'] !== '' ? $_POST['date'] : null;
$page = isset($_POST['page']) ? $_POST['page'] : 1;

$limit = 5;  // Number of rows per page
$start = ($page - 1) * $limit;

// Base query with dynamic filters
$query = "SELECT product_name, category, branch_name, qty, total_amount,
          transaction_date, staff_acc, cash_received, cash_change
          FROM transactions WHERE 1=1";

// Apply branch filter if selected
if (!empty($branch)) {
    $query .= " AND branch_name = '$branch'";
}

// Apply category filter if selected
if (!empty($category)) {
    $query .= " AND category = '$category'";
}

// Apply date filter if selected
if (!empty($date)) {
    $query .= " AND DATE(transaction_date) = '$date'";
}

// Add pagination
$query .= " LIMIT $start, $limit";

// Execute query
$result = $dbconn->query($query);

// Fetch total number of records for pagination (with filters applied)
$countQuery = "SELECT COUNT(*) AS total FROM transactions WHERE 1=1";

// Apply branch filter
if (!empty($branch)) {
    $countQuery .= " AND branch_name = '$branch'";
}

// Apply category filter
if (!empty($category)) {
    $countQuery .= " AND category = '$category'";
}

// Apply date filter
if (!empty($date)) {
    $countQuery .= " AND DATE(transaction_date) = '$date'";
}

$countResult = $dbconn->query($countQuery);
$totalRecords = $countResult->fetch_assoc()['total'];

// Output Transaction Table
echo '<table class="table table-sm table-hover">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td class='align-content-center ps-4'>
                    <small><span class='text-muted'>Branch</span></small><br>
                    <span class='fw-bold'>{$row['branch_name']}</span>
                </td>
                <td class='align-content-center'>
                    <small><span class='badge text-bg-secondary'>{$row['category']}</span></small><br>
                    <small><span class='fw-bold'>{$row['product_name']}</span></small>
                </td>
                <td class='align-content-center'>
                    <small><span class='fw-bold'>x{$row['qty']} pc/s.</span></small>
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
    echo "<tr><td colspan='5'>No records found.</td></tr>";
}
echo '</table>';

// Pagination Logic
$totalPages = ceil($totalRecords / $limit);

echo '<nav class="justify-content-end">';
echo '<ul class="pagination">';

// Previous Button
if ($page > 1) {
    echo "<li class='page-item'>
            <a class='page-link' href='#' data-page='" . ($page - 1) . "'>
                <i class='bi bi-arrow-left'></i>
            </a>
          </li>";
} else {
    echo "<li class='page-item disabled'>
            <a class='page-link' href='#'>
                <i class='bi bi-arrow-left'></i>
            </a>
          </li>";
}

// Page numbers
for ($i = 1; $i <= $totalPages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    echo "<li class='page-item $activeClass'>
            <a class='page-link' href='#' data-page='$i'>$i</a>
          </li>";
}

// Next Button
if ($page < $totalPages) {
    echo "<li class='page-item'>
            <a class='page-link' href='#' data-page='" . ($page + 1) . "'>
                <i class='bi bi-arrow-right'></i>
            </a>
          </li>";
} else {
    echo "<li class='page-item disabled'>
            <a class='page-link' href='#'>
                <i class='bi bi-arrow-right'></i>
            </a>
          </li>";
}

echo '</ul>';
echo '</nav>';
exit();
?>
