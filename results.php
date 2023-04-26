<html>
<head>
  <title>Phil-Chon Treats Search Results</title>
  <meta charset="utf-8">
  <style>
  div {
        text-align: center;
      }
  h1, h4, p  {
      text-align: center;
      padding: 10px;
  }
  </style>
</head>
<body>
  <h1>Phil-Chon Treats Search Results</h1>
  <p><a href = "admin_homepage.php" >Phil Admin Homepage</a> | 
  <a href = "search.html">Search A Phil Chon Product</a> | 
  <a href = "newproduct.html" >Add A Phil Chon Product</a> | 
  <a href = "deleteproduct.html"> Delete A Phil Chon Product</a> | 
  <a href = "logout.php">Logout</a></p><hr>
<?php

  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);
  $all = "all";

  if (!$searchtype || !$searchterm) {
    if ($searchtype == $all){
    }
    else {
     echo 'You have not entered search details.  Please go back and try again.';
     echo "<br><a href = 'search.html'>Back to Search Product</a>";
     exit;
    }

  }

    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);

$servername = "localhost";
$username = "philchon";
$password = "philchon";

try {
  $db = new PDO("mysql:host=$servername;dbname=philchon", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

  if ($searchtype == $all){
    $query = "select * from products";
  }
  else {
      $query = "select * from products where ".$searchtype." like '%".$searchterm."%'";
  }

  $result = $db->query($query);

  $num_results = $result->rowCount();

  if ($num_results == 0) {
      echo 'No results found';
      echo "<br><a href = 'search.html'>Back to Search Product</a>";
  } 
  else {
    echo "<h4>Number of products found: ".$num_results."</h4>";
  }

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch(PDO::FETCH_ASSOC);
     echo "<p>".($i+1)."<strong>. Product ID: </strong>";
     echo stripslashes($row['PID']);
     echo "<strong><br />Product Name: </strong>";
     echo stripslashes($row['PRODUCT']);
     echo "<br/><strong>Product Description: </strong>";
     echo htmlspecialchars(stripslashes($row['DESCRIPTION']));
     echo "<br /><strong>Price: </strong>";
     echo "$".stripslashes($row['PRICE']);
    $s=$row['IMAGE'];
    echo '<br><img src="images/'.$s.'" alt="Product Pictures" style="width:400px;height:300px">';
     echo "</p>";
  }

  $result->closeCursor();
  $db = null;

?>
</body>
</html>
