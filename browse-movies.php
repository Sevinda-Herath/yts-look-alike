<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movies - Browse</title>
    <link rel="stylesheet" href="/Proj_YTS/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet"></head>
<body>
    <header>
        <div class="nav-bar">
        <ul>
                <li><a class="active" href="/Proj_YTS/index.php">My Movies</a></li>  
                <li style="float: right;"><a href="/Proj_YTS/search-movies.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li style="float: right;"><a class="active" href="/Proj_YTS/browse-movies.php">Browse</a></li>
                <li style="float: right;"><a href="/Proj_YTS/index.php">Home</a></li>
            </ul>
        </div>
    </header>
   
    <div class="content">
        <!-- title -->
        <h1>Browse Movies</h1>
        <div class="bro-movies" id="movies-container">
        <?php include '../Proj_YTS/php/bro-movies.php'; ?>
        </div>

        <div class="bro-btn">
            <div class="load-btn">
                <button id="load-more">Load More</button>
            </div>
            <div class="limit-btn">
                <label for="limit">Limit:</label>
                <select name="limit" id="limit">
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                </select>
            </div>
        </div>



    </div>

    <footer>
        <div class="footer-bar">
          <ul class="footer-menu">
          <li><a href="/Proj_YTS/index.php">Home</a></li>
            <li><a href="/Proj_YTS/browse-movies.php">Browse</a></li>
            <li><a href="/Proj_YTS/search-movies.php">Search</a></li>
          </ul>
          <p>Copyright © 2024, All Right Reserved <a href="https://sevinda-herath.github.io">Sevinda Herath</a></p>
        </div>
      </footer>

      <script>
            document.addEventListener('DOMContentLoaded', () => {
                let offset = 20; // Start with the initial offset (since 20 movies are already loaded)
                const loadMoreBtn = document.getElementById('load-more');
                const moviesContainer = document.getElementById('movies-container');
                const limitSelector = document.getElementById('limit');
            
                loadMoreBtn.addEventListener('click', () => {
                    const limit = parseInt(limitSelector.value, 10); // Get the selected limit as an integer
                
                    // Make an AJAX request
                    fetch(`../Proj_YTS/php/load-more-movies.php?offset=${offset}&limit=${limit}`)
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() === "No more movies found.") {
                                alert("No more movies to load.");
                            } else {
                                // Append the new movies to the container
                                moviesContainer.innerHTML += data;
                            
                                // Update the offset by adding the number of movies just fetched
                                offset += limit;
                            }
                        })
                        .catch(error => console.error('Error fetching movies:', error));
                });
            });
</script>

</body>
</html>