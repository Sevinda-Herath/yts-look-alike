<?php
header('Content-Type: application/json'); // Ensure JSON response

// Database connection
$host = 'localhost';
$dbname = 'csv_db_5'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => "Database connection failed: " . $e->getMessage()]);
    exit;
}

// Get the page number from the request
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 20; // Number of movies per page
$offset = ($page - 1) * $limit;

$sql = "SELECT `URL`, `id`, `MoviePosterSrc`, `ReleasedYear`, `MovieTitle` 
        FROM output_movie_dataset 
        ORDER BY MovieTitle ASC 
        LIMIT :limit OFFSET :offset";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['movies' => $movies]);
} catch (PDOException $e) {
    echo json_encode(['error' => "Query failed: " . $e->getMessage()]);
}
