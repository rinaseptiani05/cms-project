<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("koneksi ke database error");
}

// handle form post submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    /* get data dari table user */

    // get data yang di inputkan user
    $dataUsername = $_POST["username"];
    $dataPassword = $_POST["password"];

    // prepare statement
    $stmt = $conn->prepare("SELECT * FROM t_user WHERE username = ?");
    $stmt->bind_param("s", $dataUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // jika username ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // verify the password
        if (password_verify($dataPassword, $row['password'])) {
            // Password is correct, redirect to home.php
            header('Location: home.php');
        } else {
            // Password is incorrect
            echo "<p style='color: red;'>Username atau password yang Anda masukkan salah, silakan coba lagi!</p>";
        }
    } else {
        // Username not found
        echo "<p style='color: red;'>Username atau password yang Anda masukkan salah, silakan coba lagi!</p>";
    }

    $stmt->close();
}
$conn->close();

?>
