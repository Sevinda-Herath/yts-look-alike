<!--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-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movies - Home</title>
    <link rel="stylesheet" href="/Proj_YTS/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- header -->
    <header>
        <div class="nav-bar">
            <ul>
                <li><a class="active" href="/Proj_YTS/index.php">My Movies</a></li>  
                <li style="float: right;"><a href="/Proj_YTS/search-movies.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li style="float: right;"><a href="/Proj_YTS/browse-movies.php">Browse</a></li>
                <li style="float: right;"><a class="active" href="/Proj_YTS/index.php">Home</a></li>
            </ul>
        </div>
    </header>

    <div class="content">
        <!-- title -->
        <h1>Home</h1>

        <!-- content -->

        <div class="back1">
        <h2 class="most-h2">Most Popular Movies</h2>
        <div class="most-popular-movies">
            <?php include '../Proj_YTS/php/populer_movies.php'; ?>
        </div>
        </div>

    
    <div class="back2">
        <h2>Latest Movies</h2>
        <div class="latest-movies">
            <?php include '../Proj_YTS/php/latest_movies.php'; ?>
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

      
      
    
</body>
</html>

