<!DOCTYPE html>
<html>
<head>
  <title>Phil-Chon Treats Entry Results</title>
  <style>
  div {
        text-align: center;
      }
  h1, p  {
      text-align: center;
      padding: 10px;
  }
  </style>
</head>
<body>
<h1>Phil-Chon Entry Results</h1>
  <p><a href = "admin_homepage.php" >Phil Admin Homepage</a> | 
  <a href = "search.html" >Search A Phil Chon Product</a> | 
  <a href = "newproduct.html" >Add A Phil Chon Product</a> | 
  <a href = "deleteproduct.html" > Delete A Phil Chon Product</a> | 
  <a href = "logout.php">Logout</a></p><hr>
<?php
  $productName=$_POST['PRODUCT'];
  $image=$_POST['IMAGE'];
  $productDescription=$_POST['DESCRIPTION'];
  $price=$_POST['PRICE'];

  if (!$productName || !$image || !$productDescription || !$price) {
     echo "Please enter correct details for submission.<br />"
          ."Please go back and try again.";
     exit;
  }

  $productName = addslashes($productName);
  $productDescription = addslashes($productDescription);
  $price = doubleval($price);

  $servername = "localhost";
  $username = "philchon";
  $password = "philchon";

  try {
    $db = new PDO("mysql:host=$servername;dbname=philchon", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  $query = "insert into products values
            (DEFAULT, '".$productName."', '".$price."', '".$image."','".$productDescription."')";

  $result = $db->query($query);

  $num_results = $result->rowCount();

  if ($num_results == 0) {
      echo 'No results found';
  } 
  else {
    echo "<p>Number of products inserted: ".$num_results."</p>";
  }

  $db = null;
?>
<p><a href = "admin_homepage.php">Back to Main Page</a></p>
</body>
</html>
