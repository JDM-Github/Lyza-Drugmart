<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "lyza_system");

// Calculate total revenue
$total_revenue = $mysqli->query("SELECT SUM(total_price) AS total FROM transactions")->fetch_assoc()['total'];

// Count stockouts
$stockouts = $mysqli->query("SELECT COUNT(*) AS count FROM products WHERE stock = 0")->fetch_assoc()['count'];

// Count low stock items
$low_stock = $mysqli->query("SELECT COUNT(*) AS count FROM products WHERE stock < 5")->fetch_assoc()['count'];

// Fetch transactions
$transactions = $mysqli->query("SELECT * FROM transactions ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Admin Dashboard</h1>

<p>Total Revenue: $<?php echo number_format($total_revenue, 2); ?></p>
<p>Stockouts: <?php echo $stockouts; ?></p>
<p>Low Stock Items: <?php echo $low_stock; ?></p>

<h2>Recent Transactions</h2>
<table>
    <tr>
        <th>Date</th>
        <th>Branch</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Price</th>
    </tr>
    <?php while ($row = $transactions->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['branch_id']; ?></td>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="manage_branches.php">Manage Branches</a>
<a href="manage_staff.php">Manage Staff</a>
<a href="logout.php">Logout</a>


<div class="modal fade" id="print-details-modal" tabindex="-1" aria-labelledby="print-details-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!------- Modal Header ---------->
            <div class="modal-header bg-success-subtle">
                <h1 class="modal-title fs-5" id="print-details-label">Print Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!------- Modal Body ---------->
            <div class="modal-body">                
                ...
            </div>
            <!------- Buttons ---------->
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="print-transaction-details" class="btn">
                    Print
                </button>                            
            </div>
        </div>
    </div>
</div>



</body>
</html>
