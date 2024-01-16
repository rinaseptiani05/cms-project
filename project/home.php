<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Home - Siakad</title>
    <style>
    .login-container {
      display: flex;
      margin-left: 80px;
    }
    .login-container2 {
      margin-left: 30px;
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
include_once('login.php');
include_once('functions.php');

$mahasiswa = getMahasiswa();
$prodi = getProdi();
?>

  <br><br>
  <h1 align="center">SISTEM INFORMASI AKADEMIK</h1>
  <br><br><br>
  <div class="col card-header text-right">
  <a href="post.php" <button type="submit" class="btn btn-primary">Post</button></a>
  </div>
  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" align="center">Daftar Mahasiswa</h5>
        <a href="create-mhs.php" class='btn btn-primary'>Create</a>
        <table class="table table-striped">
        <thead>
          <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($mahasiswa as $index => $m): ?>
              <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $m['nim']; ?></td>
                    <td><?php echo $m['nama_mahasiswa']; ?></td>
                    <td><?php echo $m['nama_prodi']; ?></td>
                    
                    <?php
                    echo '<td>';
                    echo '<a href="update-mhs.php?nim=' . $m['nim'] . '" class="btn btn-sm btn-primary">Update</a>';
                    echo '<a href="delete-mhs.php?nim=' . $m['nim'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah kamu yakin ingin menghapus data ini?\')">Delete</a>';
                    echo '</td>';
                    ?>

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
        <a href="create-p.php" class='btn btn-primary'>Create</a>
        <table class="table table-striped">
        <thead>
          <tr>
                <th>No.</th>
                <th>Program Studi</th>
                <th></th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($prodi as $index => $p): ?>
              <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $p['nama_prodi']; ?></td>
                    <td></td>

                    <?php
                    echo '<td>';
                    echo '<a href="update-p.php?id=' . $p['id'] . '" class="btn btn-sm btn-primary">Update</a>';
                    echo '<a href="delete-p.php?id=' . $p['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah kamu yakin ingin menghapus data ini?\')">Delete</a>';
                    echo '</td>';
                    ?>

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
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
