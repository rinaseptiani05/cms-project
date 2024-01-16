<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Tambah Mahasiswa</title>
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

<?php
include_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  insertMahasiswa();
}

$prodi = getProdi();
?>

  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <form method="post" action="">
        <div class="row">
            <label for="">NIM Mahasiswa : </label>
            <input class="form-control" type="text" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
          </div>
          <div class="row">
            <label for="">Nama Mahasiswa : </label>
            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
          </div>
          <div class="row">
            <label for="">Program Studi : </label>
            <select class="form-control" name="prodi_id">
              <?php for($i = 0; $i < count($prodi); $i++): ?>
                <option value="<?php echo $prodi[$i]['id'] ?>">
                  <?php echo $prodi[$i]['nama_prodi'] ?>
                </option>
              <?php endfor ?>
            </select>
          </div>

          <br>
          <center><button type="submit" class="btn btn-primary">Create</button></center>
          
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