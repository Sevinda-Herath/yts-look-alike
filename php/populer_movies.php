<?php
include 'connect.php';

// Fetch the latest 5 movies
$sql = "SELECT  `URL`, `id`, `MoviePosterSrc`, `ReleasedYear`, `MovieTitle` FROM output_movie_dataset ORDER BY YTSLikes DESC LIMIT 8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the latest movies
    while ($row = $result->fetch_assoc()) {
        echo '<a href="' . $row['URL'] . '" id="' . $row['id'] .'" target="_blank">';
        echo '<div class="movie">';
        echo '<img src="' . $row['MoviePosterSrc'] . '" alt="' . $row['MovieTitle'] . '">';
        echo '<p>' . $row['MovieTitle'] . ' - ' . $row['ReleasedYear'] . '</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo "No movies found.";
}

$conn->close();
?>
