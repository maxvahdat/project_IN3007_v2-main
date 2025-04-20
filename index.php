<?php require "php/functions.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover a plethora of Iranian literature">
    <meta name="keywords" content="culture, history, polictics, books, iranian">
    <link rel="stylesheet" href="libs/css/styles.css">
    <title>Satrap</title>
</head>

<body>
    <?php include "includes/nav.php" ?>
    <?php include "includes/header.php" ?>

    <main>
        <div class="left">
            <div class="section-title">Book Genres</div>
            <?php $genres = getGenres() ?>
            <?php 
                foreach($genres as $genre){
                    ?>
                        <a href="genre.php?genre=<?php echo urlencode($genre['name'])?>">
                            <?php echo ucfirst($genre['name'])?>
                        </a>
                    <?php
                }
            ?>
        </div>
        <div class="right">
            <div class="section-title">Home Page</div>
            <?php $books = getHomePageBooks(4) ?>
            <div class="book">
                <?php
                    foreach($books as $book){
                        ?>
                                        <div class="book-left">
                    <img src="<?php echo "books/{$book['image']}"?>" alt="">
                </div>
                <div class="book-right">
                    <p class="title">
                        <a href="book.php?title=<?php echo $book['name']?>">
                            <?php echo $book['name'] ?>
                        </a>
                    </p>
                    <p class="author">
                        <?php echo $book['author_name'] ?>
                    </p>
                    <p class="value">
                        <?php echo $book['price'] ?>
                    </p>
                </div>
                        
                        <?php
                    }

                ?>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>

    <script src="js/script.js"></script>
</body>

</html>