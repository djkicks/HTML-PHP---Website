<!DOCTYPE html>
<html>
<head>
  <title>Phil-Chon Treats Delete Section</title>
  <style>
  div {
        text-align: center;
      }
  h1, h3, p  {
      text-align: center;
  }
  </style>
</head>
<body>
<h1>Phil-Chon Treats Delete Section</h1>
  <p><a href = "admin_homepage.php">Phil Admin Homepage</a> |
  <a href = "search.html" >Search A Phil Chon Product</a> |
  <a href = "newproduct.html" >Add A Phil Chon Product</a> |
  <a href = "deleteproduct.html" > Delete A Phil Chon Product</a> |
  <a href = "logout.php">Logout</a></p>
<?php
 
  $productID=$_POST['PID'];

  if (!$productID) {
     echo "This philchon item does not exist.<br />"
          ."Please go back and try again.";
     exit;
  }

    $productID = addslashes($productID);

$servername = "localhost";
$username = "philchon";
$password = "philchon";

try {
  $db = new PDO("mysql:host=$servername;dbname=philchon", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

  $query = "delete from products where PID = ".$productID; 
  $result = $db->query($query);

  $num_results = $result->rowCount();

  if ($num_results == 0) {
      echo "That phil chon product does not exist.  Try Again.";
      echo "<br><a href = 'deleteproduct.html'>Back to Delete Product</a>";
  } 
  else {
    echo "<br><h3>Number of Phil Chon products deleted: ".$num_results."</h3>";
  }

  $db = null;
?>
</body>
</html>
