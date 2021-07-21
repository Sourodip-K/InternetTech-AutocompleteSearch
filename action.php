<?php
  require_once 'config.php';
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT fname FROM personaldetails WHERE fname LIKE :name';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();
    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['fname'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>