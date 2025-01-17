<?php
// Set the default timezone to your preference
date_default_timezone_set('Poland');

// Format the date
$currentDate = date('F j, Y');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <style>
        table {
                width: 100%;
        }
        td {
                text-align: center;
        }
    </style>
</head>

<body>
    
<div class="header">
        <table>
            <tr>
                <td><a href="./" style="color: magenta">Magnolia </td>
                <td><?= $currentDate ?></td>
                <td>
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        echo '<button class="open-btn" id="przycisk" onclick="openForm()">Login/Register</button>';
                    } else {
                        echo "Welcome, " . $_SESSION['username'] . '! <button class="btn-logout" onclick="logout()">Logout</button>';
                        echo '<button class="cart-btn" onclick="openCart()">View cart</button>';
                        echo '<button class="cart-btn" onclick="window.location.href=\'myaccount.php\'">User panel</button>';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>

    
    <!-- The rest of your website's content goes here -->
 <div class="flex-container" id="containerr">
    <div class="form-popup" id="LoginForm">
        <form action="components/login.php" method="post" class="form-container" id="form-container-login">
            <div class="form-popup-topbar">Login użytkownika
            </div>
            
            <h3>Login</h3>

            <label for="username"><b>Login</b></label>
            <input type="text" placeholder="Enter username" name="username" id="username" required><br>

            <label for="psw"><b>Haslo</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required><br><br>

            <button type="submit" class="form-btn">Zaloguj</button>
            <button type="button" class="form-btn" onclick="closeForm()">Zamknij</button>
            <button type="button" class="form-btn" onclick="openRegisterForm()">Rejestracja</button>
        </form>
    </div>

    <div class="form-popup-register" id="RegisterForm">
        <form action="components/register.php" method="post" class="form-container" id="form-container-register">
            <div class="form-popup-topbar2">stworz uzytkownika
            </div>
            <h3>Rejestracja</h3>

            <label for="username"><b>Login</b></label>
            <input type="text" placeholder="Enter username" name="username" id="username" required><br>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required><br>

            <label for="psw"><b>Haslo</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>

            <label for="psw2"><b>Powtorz haslo</b></label>
            <input type="password" placeholder="Enter Password" name="psw2" id="psw2" required><br><br>

            <button type="submit" class="form-btn-register">Rejestruj</button>
            <button type="button" class="form-btn-register" onclick="closeForm()">Zamknij</button>
        </form>
    </div>
 </div>

 <script>
        // Pobranie elementów
        const box = document.getElementById('containerr');
        const button = document.getElementById('przycisk');
        
        // Obsługa kliknięcia w przycisk
        button.addEventListener('click', () => {
            box.classList.add('visible'); // Dodanie klasy powodującej wyświetlenie obiektu
        });
    </script>

</body>
</html>