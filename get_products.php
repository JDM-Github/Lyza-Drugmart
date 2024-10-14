<?php

include "includes/dbh.inc.php";

// Get the selected category and search term from AJAX
$category = isset($_POST['category']) ? $_POST['category'] : 'All';
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

// Base query
$query = "SELECT * FROM products WHERE 1";

// If a specific category is selected and not "All", filter by category
if ($category != 'All') {
    $query .= " AND category = ?";
}

// If a search term is provided, filter by product name using LIKE
if (!empty($searchTerm)) {
    $query .= " AND product_name LIKE ?";
}

// Prepare the SQL statement
$stmt = $dbconn->prepare($query);

// Bind parameters based on the conditions
if ($category != 'All' && !empty($searchTerm)) {
    $likeSearchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("ss", $category, $likeSearchTerm);
} elseif ($category != 'All') {
    $stmt->bind_param("s", $category);
} elseif (!empty($searchTerm)) {
    $likeSearchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $likeSearchTerm);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

$products = [];

// Fetch products and store them in an array
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Return the products as JSON
echo json_encode($products);

// Close the statement and connection
$stmt->close();
$dbconn->close();

?>
