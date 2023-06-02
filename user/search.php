<?php

// Include the manageUser.php file using the relative directory path
include('/userFunction/manageUser.php');
echo '<script> console.log("from The search")</script>';
$manageUser = new manageUser();
$conn = $manageUser->conn;

$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

if (!empty($searchQuery)) {
  $query = "SELECT * FROM workersignup WHERE worker_full_name LIKE '%$searchQuery%' OR workerType LIKE '%$searchQuery%'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($searchResults);
  } else {
    echo json_encode(['error' => mysqli_error($conn)]);
  }
} else {
  echo json_encode(['message' => 'No search query provided.']);
}

// Additional error reporting and debugging
if (mysqli_error($conn)) {
  echo '<br>Error: ' . mysqli_error($conn);
}

echo '<br>Query: ' . $query;
echo '<br>Search Query: ' . $searchQuery;
?>
