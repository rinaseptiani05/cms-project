<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Baca Data</title>
    <style>
    .login-container {
      display: flex;
      margin-left: 230px;
    }
    .login-container2 {
      margin-left: 50px;
    }
    .login-container3 {
      margin-top: 100px;
    }
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    body {
    background-image: url("bg/bg.jpg");
  }
  h1 {
    font-weight: bold;
    background-color: lightgray;
  }
  </style>
</head>
<body>
<?php
include_once('functions.php');

$mahasiswa = getMahasiswa();
$prodi = getProdi();
$post = getPost();

?>

  <br><br>
  <h1 align="center">SISTEM INFORMASI AKADEMIK</h1>
  <br><br><br>
  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" align="center">Daftar Mahasiswa</h5>
        <table class="table table-striped">
        <thead>
          <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($mahasiswa as $index => $m): ?>
              <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $m['nim']; ?></td>
                    <td><?php echo $m['nama_mahasiswa']; ?></td>
                    <td><?php echo $m['nama_prodi']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="login-container2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" align="center">Daftar Program Studi</h5>
        <table class="table table-striped">
        <thead>
          <tr>
                <th>No.</th>
                <th>Program Studi</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($prodi as $index => $p): ?>
              <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $p['nama_prodi']; ?></td>
                    <td></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="login-container3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" align="center">Post</h5>
        <table class="table table-striped">
        <thead>
          <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($post as $index => $pst): ?>
              <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $pst['title_post']; ?></td>
                    <td><?php echo $pst['description']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>

<br><br><br><br><br><br><br><br><br><br>

<div class="center">
  <a href="logout.php" <button type="submit" class="btn btn-primary">Logout</button></a>
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