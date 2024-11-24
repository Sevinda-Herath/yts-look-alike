<?php
include 'connect.php';

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;

// Fetch movies with limit and offset
$sql = "SELECT `URL`, `id`, `MoviePosterSrc`, `ReleasedYear`, `MovieTitle` 
        FROM output_movie_dataset 
        ORDER BY MovieTitle ASC 
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="' . $row['URL'] . '" id="' . $row['id'] .'" target="_blank">';
        echo '<div class="movie">';
        echo '<img src="' . $row['MoviePosterSrc'] . '" alt="' . $row['MovieTitle'] . '">';
        echo '<p>' . $row['MovieTitle'] . ' - ' . $row['ReleasedYear'] . '</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo "No more movies found.";
}

$conn->close();
?>
