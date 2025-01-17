<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="col-lg-2" id="menu1">
        <div>
            <h2>MENU</h2>
            <button class="menu" onclick='window.location.href="index.php"'>Zobacz produkty</button></br>
        </div>
        <?php
            if(isset($_SESSION['accgroup'])){
                if($_SESSION['accgroup'] == 100){
                    echo '<div>';
                    echo '<button class="menu" onclick="window.location.href=\'admin.php\'">Admin panel</button>';
                    echo '</div>';
                } else {
                    echo "";
                }
            }
        ?>
    </div>
</body>
</html>