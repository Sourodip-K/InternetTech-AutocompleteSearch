<?php
  require_once 'config.php';
  if (isset($_POST['submit'])) {
    $name = $_POST['search'];
    $sql = 'SELECT * FROM personaldetails WHERE fname = :fname';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['fname' => $name]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['fname'] ?></h1>
          </div>
          <div class="card-body">
            <h4><b>First Name :</b> <?= $row['fname'] ?></h4>
            <h4><b>Last Name :</b> <?= $row['lname'] ?></h4>
            <h4><b>Age :</b> <?= $row['age'] ?></h4>
            <h4><b>Department :</b> <?= $row['department'] ?></h4>
            <h4><b>Address :</b> <?= $row['address'] ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>