<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butik Magnolia</title>
    <link rel="stylesheet" href="main.css">
</head>

<body onload="setscroll()" onbeforeunload="getscroll()">

<?php include 'components/header.php';?>


    <h1> hejb </h1>

    <div class="parentcontainer">
    <?php include 'components/menu.php';?>
    <div class="container">
        
        <div class="jumbotron" id="MainpageHeader">
            <div>
                <h2>Magnolia </h2>
                <p>Najlepszy sklep z butami w Grzybowicach </p>
            </div>
        </div>
            <div class="row">
                <div id="MainpageGallery">
                    <h3> Galeria produktow </h3>
                </div>
                <div class="gallery" id="MainpageGallery">
                    <!-- PHP code to display products -->
                    <?php
                    // Include database connection file
                    require_once 'components/dbconfig.php'; // Adjust the path as needed
                    $mysqli = mysqli_connect($server,$user,$pass,$base) or ('Something went wrong');
          

                    // Close database connection
                    $mysqli->close();
                    ?>
                </div>
        </div>
    </div>
</div>

</body>
</html>