<?php 
    include "config.php"; //getting from config.php
    session_start();
    
    include "cart.class.php"; //getting from cart.class.php
    $cart=new Cart();
    
    if(isset($_POST["submit"])){
        
        $name=mysqli_real_escape_string($con,$_POST["name"]);
        $email=mysqli_real_escape_string($con,$_POST["email"]);
        $address=mysqli_real_escape_string($con,$_POST["address"]);
        $city=mysqli_real_escape_string($con,$_POST["city"]);
        
        // inserts all information added to the database name, email and address
        $sql="INSERT into users (NAME,EMAIL,ADDRESS) values ('{$name}','{$email}','{$address}')";
        if($con->query($sql)){
            $uid=$con->insert_id;

            //puts the order information
            $order_no=rand(10000,100000);
            $total_amt=$cart->get_cart_total();
            $sql="INSERT into ORDERS (ORDER_NO,ORDER_DATE,UID,TOTAL_AMT) values ('{$order_no}',NOW(),'{$uid}','{$total_amt}')";
            if($con->query($sql)){
                $oid=$con->insert_id;
                
                $sql="insert into order_details (OID,PID,PNAME,PRICE,QTY,TOTAL) values ";
                $rows=[];
                foreach($cart->get_all_items() as $item){
                    $rows[]="('{$oid}','{$item["id"]}','{$item["name"]}','{$item["price"]}','{$item["qty"]}','{$item["total"]}')";
                }
                $sql.=implode(",",$rows);
                if($con->query($sql)){
                    $cart->destroy();
                    header("location:complete.php?order_no={$order_no}");
                }
            }
            
        }
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Checkout Here</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class='container mt-5'>
            <h2 class='text-muted mb-4'>Enter Shipping Information Here</h2>
            <div class='row'>
                <div class='col-md-6 mx-auto'>
                    <form method='post' action='<?php echo $_SERVER["REQUEST_URI"];?>' autocomplete="off">
                        <div class='form-group'>
                            <label>Name</label>
                            <input type='text' name='name' class='form-control' required placeholder='User Name'>
                        </div>
                        <div class='form-group'>
                            <label>Email</label>
                            <input type='email' name='email' class='form-control' required placeholder='User Name'>
                        </div>
                        <div class='form-group'>
                            <label>Address</label>
                            <textarea class='form-control' required name='address'></textarea>
                        </div>
                        <input type='submit' name='submit' value='Checkout' class='btn btn-primary'>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html> 
