<?php
// Database connection
$host = 'localhost';
$dbname = 'csv_db 5'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Initialize query parameters
$queryTitle = isset($_POST['query_title']) ? trim($_POST['query_title']) : '';
$queryDirector = isset($_POST['query_director']) ? trim($_POST['query_director']) : '';
$year = isset($_POST['year']) ? $_POST['year'] : 'all';
$sort = isset($_POST['sort']) ? $_POST['sort'] : 'title';
$order = isset($_POST['order']) ? strtoupper($_POST['order']) : 'ASC';
$categories = isset($_POST['category']) ? $_POST['category'] : [];
$limit = 4; // Default number of movies to fetch

// Base SQL query
$sql = "SELECT `URL`, `id`, `MoviePosterSrc`, `ReleasedYear`, `MovieTitle` 
        FROM output_movie_dataset WHERE 1=1";

// Add filtering conditions
$params = [];

// Filter by title
if (!empty($queryTitle)) {
    $sql .= " AND MovieTitle LIKE :title";
    $params[':title'] = "%" . $queryTitle . "%";
}

// Filter by director
if (!empty($queryDirector)) {
    $sql .= " AND MovieDirector LIKE :director";
    $params[':director'] = "%" . $queryDirector . "%";
}

// Filter by year
if ($year !== 'all') {
    if ($year === 'older') {
        $sql .= " AND ReleasedYear < 2000";
    } elseif (is_numeric($year)) {
        $sql .= " AND ReleasedYear >= :year";
        $params[':year'] = $year;
    }
}

// Filter by categories
if (!empty($categories) && !in_array('all', $categories)) {
    $genreConditions = [];
    foreach ($categories as $category) {
        $genreConditions[] = "$category = 1";
    }
    $sql .= " AND (" . implode(" OR ", $genreConditions) . ")";
}

// Sorting
$allowedSortFields = ['title' => 'MovieTitle', 'r_year' => 'ReleasedYear', 'populer' => 'YTSLikes', 'rating' => 'IMDbRating', 'votes' => 'IMDbVotes'];
if (array_key_exists($sort, $allowedSortFields)) {
    $sql .= " ORDER BY " . $allowedSortFields[$sort] . " $order";
}

// Add limit directly
$sql .= " LIMIT " . intval($limit); // Use intval to ensure limit is an integer

// Execute query
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

// Display results
if (!empty($results)) {
    foreach ($results as $row) {
        echo '<a href="' . $row['URL'] . '" id="' . $row['id'] . '" target="_blank">';
        echo '<div class="movie">';
        echo '<img src="' . $row['MoviePosterSrc'] . '" alt="' . htmlspecialchars($row['MovieTitle'], ENT_QUOTES) . '">';
        echo '<p>' . htmlspecialchars($row['MovieTitle'], ENT_QUOTES) . ' - ' . $row['ReleasedYear'] . '</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo "No movies found.";
}
?>
