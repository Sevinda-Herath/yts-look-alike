<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movies - Search</title>
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
                <li style="float: right;"><a class="active" href="/Proj_YTS/search-movies.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li style="float: right;"><a href="/Proj_YTS/browse-movies.php">Browse</a></li>
                <li style="float: right;"><a href="/Proj_YTS/index.php">Home</a></li>
            </ul>
        </div>
    </header>
      <div class="content">
        <h1>Search Movies</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="line1">
          <div class="search-title">
              <label for="query_title">Movie Title:</label>
              <input type="text" name="query_title" id="query_title" placeholder="Enter movie title" value="<?php echo isset($_POST['query_title']) ? htmlspecialchars($_POST['query_title']) : ''; ?>">
          </div>

          <div class="search-director">
              <label for="query_director">Movie Director:</label>
              <input type="text" name="query_director" id="query_director" placeholder="Enter director name" value="<?php echo isset($_POST['query_director']) ? htmlspecialchars($_POST['query_director']) : ''; ?>">
          </div>
            </div>
            <div class="line2">
          <div class="search-year">
              <label for="year">Year:</label>
              <select name="year" id="year">
            <option value="all" <?php echo (isset($_POST['year']) && $_POST['year'] == 'all') ? 'selected' : ''; ?>>All</option>
            <option value="2024" <?php echo (isset($_POST['year']) && $_POST['year'] == '2024') ? 'selected' : ''; ?>>2024</option>
            <option value="2023" <?php echo (isset($_POST['year']) && $_POST['year'] == '2023') ? 'selected' : ''; ?>>2023</option>
            <option value="2022" <?php echo (isset($_POST['year']) && $_POST['year'] == '2022') ? 'selected' : ''; ?>>2022</option>
            <option value="2021" <?php echo (isset($_POST['year']) && $_POST['year'] == '2021') ? 'selected' : ''; ?>>2021</option>
            <option value="2020" <?php echo (isset($_POST['year']) && $_POST['year'] == '2020') ? 'selected' : ''; ?>>2020</option>
            <option value="2015" <?php echo (isset($_POST['year']) && $_POST['year'] == '2015') ? 'selected' : ''; ?>>2015 +</option>
            <option value="2010" <?php echo (isset($_POST['year']) && $_POST['year'] == '2010') ? 'selected' : ''; ?>>2010 +</option>
            <option value="2005" <?php echo (isset($_POST['year']) && $_POST['year'] == '2005') ? 'selected' : ''; ?>>2005 +</option>
            <option value="2000" <?php echo (isset($_POST['year']) && $_POST['year'] == '2000') ? 'selected' : ''; ?>>2000 +</option>
            <option value="older" <?php echo (isset($_POST['year']) && $_POST['year'] == 'older') ? 'selected' : ''; ?>>Older</option>
              </select>
          </div>

          <div class="search-sort">
              <label for="sort">Sort By:</label>
              <select name="sort" id="sort">
            <option value="title" <?php echo (isset($_POST['sort']) && $_POST['sort'] == 'title') ? 'selected' : ''; ?>>Title</option>
            <option value="r_year" <?php echo (isset($_POST['sort']) && $_POST['sort'] == 'r_year') ? 'selected' : ''; ?>>Year</option>
            <option value="populer" <?php echo (isset($_POST['sort']) && $_POST['sort'] == 'populer') ? 'selected' : ''; ?>>Most Popular</option>
            <option value="rating" <?php echo (isset($_POST['sort']) && $_POST['sort'] == 'rating') ? 'selected' : ''; ?>>IMDb Rating</option>
            <option value="votes" <?php echo (isset($_POST['sort']) && $_POST['sort'] == 'votes') ? 'selected' : ''; ?>>IMDb Votes</option>
              </select>
          </div>

          <div class="search-order">
              <label for="order">Order:</label>
              <select name="order" id="order">
            <option value="asc" <?php echo (isset($_POST['order']) && $_POST['order'] == 'asc') ? 'selected' : ''; ?>>Ascending</option>
            <option value="desc" <?php echo (isset($_POST['order']) && $_POST['order'] == 'desc') ? 'selected' : ''; ?>>Descending</option>
              </select>
          </div>
            </div>

            <div class="line3">
          <div class="search-cat">
              <label for="category">Category:</label>
                <div class="checkbox-group">
              <label><input type="checkbox" name="category[]" value="all" id="select-all" <?php echo (isset($_POST['category']) && in_array('all', $_POST['category'])) ? 'checked' : ''; ?>> All</label>
              <label><input type="checkbox" name="category[]" value="action" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('action', $_POST['category'])) ? 'checked' : ''; ?>> Action</label>
              <label><input type="checkbox" name="category[]" value="adventure" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('adventure', $_POST['category'])) ? 'checked' : ''; ?>> Adventure</label>
              <label><input type="checkbox" name="category[]" value="animation" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('animation', $_POST['category'])) ? 'checked' : ''; ?>> Animation</label>
              <label><input type="checkbox" name="category[]" value="biography" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('biography', $_POST['category'])) ? 'checked' : ''; ?>> Biography</label>
              <label><input type="checkbox" name="category[]" value="comedy" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('comedy', $_POST['category'])) ? 'checked' : ''; ?>> Comedy</label>
              <label><input type="checkbox" name="category[]" value="crime" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('crime', $_POST['category'])) ? 'checked' : ''; ?>> Crime</label>
              <label><input type="checkbox" name="category[]" value="documentary" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('documentary', $_POST['category'])) ? 'checked' : ''; ?>> Documentary</label>
              <label><input type="checkbox" name="category[]" value="drama" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('drama', $_POST['category'])) ? 'checked' : ''; ?>> Drama</label>
              <label><input type="checkbox" name="category[]" value="family" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('family', $_POST['category'])) ? 'checked' : ''; ?>> Family</label>
              <label><input type="checkbox" name="category[]" value="fantasy" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('fantasy', $_POST['category'])) ? 'checked' : ''; ?>> Fantasy</label>
              <label><input type="checkbox" name="category[]" value="horror" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('horror', $_POST['category'])) ? 'checked' : ''; ?>> Horror</label>
              <label><input type="checkbox" name="category[]" value="music" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('music', $_POST['category'])) ? 'checked' : ''; ?>> Music</label>
              <label><input type="checkbox" name="category[]" value="romance" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('romance', $_POST['category'])) ? 'checked' : ''; ?>> Romance</label>
              <label><input type="checkbox" name="category[]" value="thriller" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('thriller', $_POST['category'])) ? 'checked' : ''; ?>> Thriller</label>
              <label><input type="checkbox" name="category[]" value="war" class="category-checkbox" <?php echo (isset($_POST['category']) && in_array('war', $_POST['category'])) ? 'checked' : ''; ?>> War</label>
                </div>

          </div>
            </div>
            <div class="search-btn">
            <button type="submit">Search</button>
            </div>
        </form>

        <div class="latest-movies">
            <?php include '../Proj_YTS/php/search.php'; ?>
        </div>
</div>
      </div>
      <!-- footer -->
    <footer>
        <div class="footer-bar">
          <ul class="footer-menu">
          <li><a href="/Proj_YTS/index.php">Home</a></li>
            <li><a href="/Proj_YTS/browse-movies.php">Browse</a></li>
            <li><a href="/Proj_YTS/search-movies.php">Search</a></li>
          </ul>
          <p>Copyright © 2024, All Right Reserved <a href="https://sevinda-herath.github.io" target="_blank">Sevinda Herath</a></p>
        </div>
      </footer>

      <script>
                document.getElementById('select-all').addEventListener('change', function() {
                  var checkboxes = document.querySelectorAll('.category-checkbox');
                  for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                  }
                });
      </script>
    </body>
</html>