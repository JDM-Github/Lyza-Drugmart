<?php
session_start();
if (!isset($_SESSION['staff_id'])) {
    header('Location: index.php');
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "lyza_system");

// Fetch products
$products = $mysqli->query("SELECT * FROM products");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $cash_received = $_POST['cash_received'];

    $product = $mysqli->query("SELECT * FROM products WHERE product_id=$product_id")->fetch_assoc();
    $total_price = $product['price'] * $quantity;
    $change = $cash_received - $total_price;

    // Update stock
    $new_stock = $product['stock'] - $quantity;
    $mysqli->query("UPDATE products SET stock=$new_stock WHERE product_id=$product_id");

    // Record transaction
    $branch_id = $_SESSION['staff_id']; // Assuming staff_id is linked to branch
    $mysqli->query("INSERT INTO transactions (branch_id, product_id, quantity, total_price) 
                    VALUES ($branch_id, $product_id, $quantity, $total_price)");

    // Print receipt (as a simple confirmation message)
    echo "Transaction successful! Change: $" . number_format($change, 2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Branch Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Point of Sale</h1>

<form method="post" action="">
    <label for="product_id">Select Product:</label>
    <select name="product_id">
        <?php while ($row = $products->fetch_assoc()): ?>
            <option value="<?php echo $row['product_id']; ?>"><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
    </select>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>

    <label for="cash_received">Cash Received:</label>
    <input type="number" name="cash_received" required>

    <button type="submit">Process Sale</button>
</form>

<a href="logout.php">Logout</a>

</body>
</html>
