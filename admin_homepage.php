<?php
session_start(); // session starts for admin_homepage.php
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //checks to make sure the adminlogin is true to enter the homepage
    header("location: adminlogin.php"); // redirected from the admin login
    exit;
}
?>

<!-- start of the html doc for the admin page layout-->
<!DOCTYPE html> 
<html>
    <head>
        <title>Phil-Chon Treats</title>
        <style>
            div {
                text-align: center;
            }
            h1, h3 {
                font-family: "Times New Roman";
                background-color: "Red";
            }
            #footer {
                bottom:10px;
            text-align: center;
        }
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        </style>
        <!-- bootstraps -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <!-- start of the form of the admin page-->
    <body>
        <div class="p-3 mb-2 bg-light text-danger"><h1>Welcome to Phil-Chon Treats</h1> <!-- text-danger changes the color to red-->
            <h3>Admin's Page</h3>
            <nav class="navbar navbar-expand-sm justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="search.html" button = "btn btn-success">Search A Phil Chon Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newproduct.html">Insert A Phil Chon Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="deleteproduct.html">Delete A Phil Chon Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </nav>
        </div>

        <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- the arrows to move through the images-->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          
          <!-- the images chosen for the slideshow for the carousel of our website-->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/Philipine Street Food.jpg" alt="Philippine Street Food" width="600" height="400">
            </div>
            <div class="carousel-item">
              <img src="images/Phil-Chon-icon.jpeg" alt="Cart" width="600" height="400">
            </div>
            <div class="carousel-item">
              <img src="images/filipinosnacks.jpeg" alt="Filipino snacks" width="600" height="400">
            </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
    </body>
</html>
 