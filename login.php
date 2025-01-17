<?php
session_start();

// Include database connection file
require_once 'dbconfig.php'; // Adjust the path as needed

// Establish database connection
$mysqli = mysqli_connect($server, $user, $pass, $base);

if (!$mysqli) {
    die("Blad polaczenia z baza danych: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Wszystkie pola sa wymagane.";
    } else {
        // Prepare SQL query
        $query = "SELECT id, name, password, accgroup FROM users WHERE name = ?";

        // Prepare statement
        if ($stmt = $mysqli->prepare($query)) {
            // Bind parameters
            $stmt->bind_param("s", $username);

            // Execute query
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $db_username, $db_password, $accgroup);

                    // Fetch result
                    if ($stmt->fetch()) {
                        // Verify password
                        if (password_verify($password, $db_password)) {
                            // Password is correct, set session variables
                            $_SESSION['user_id'] = $id;
                            $_SESSION['username'] = $db_username;
                            $_SESSION['accgroup'] = $accgroup;

                            // Redirect to dashboard
                            header("Location: monit.php");
                            exit();
                        } else {
                            // Incorrect password
                            echo "Nieprawidlowy login lub haslo.";
                        }
                    }
                } else {
                    // Username doesn't exist
                    echo "Nieprawidlowy login lub haslo.";
                }
            } else {
                echo "Blad zapytania: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Blad przygotowania zapytania: " . $mysqli->error;
        }
    }
}

// Close database connection
$mysqli->close();
?>