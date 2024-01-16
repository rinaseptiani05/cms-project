<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Post</title>
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

$post = getPost();
?>

  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" align="center">Post</h5>
        <a href="create-post.php" class='btn btn-primary'>Create Post</a>
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
        <br>
            <a href="home.php">Back</a>
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
