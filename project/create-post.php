<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membersihkan input
function clean_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

// handle form post submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari formulir
    $title = clean_input($_POST["title"]);
    $description = clean_input($_POST["description"]);

    // Insert data ke database
    $sql = "INSERT INTO post (title, description) VALUES ('$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Post berhasil dibuat";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Create Post</title>
  <style>
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    body {
    background-image: url("bg/bg.jpg");
  }
  </style>
</head>

<body>
    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" align="center">Create Post</h5>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="100" rows="10" placeholder="Description" required></textarea>
                    </div>
                    <center><button type="submit" class="btn btn-primary">Create Post</button></center>
                    <br>
                    <a href="post.php">Back</a>
                </form>
            </div>
        </div>
    </div>
    
    <br><br><br><br><br>
    
    <footer style="text-align: center; color: blue;">
      <p>Copyright &copy; 2023 Rina Septiani.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>