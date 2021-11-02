<?php 
include_once "server.php";
//include_once "process.php";
//require_once "stock.php";
$update = false;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include_once "header.php"; ?>

    <?php
    //Default Variables declarations
    $product = "";
    $qty= "";
    $unitPrice = "";
    //$totalPrice = $qty*$unitPrice;

    if(isset($_SESSION['msg'])): ?>
  <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
        <p style="text-align:center; font-weight:bold;"><?php echo $_SESSION['msg'];  ?></p>
  </div>
  <?php session_unset(); ?>
  <?php endif; ?>

<div class="container">
<?php
    if(isset($_GET['edit'])){
        //defining ID variables
        $id = $_GET['edit'];
        $update = true;

        $query = "SELECT * FROM stock WHERE id='$id' ";
        //$result = mysqli_query($server, $query);

        $result = $server->query($query);

        if($result){
            $row = mysqli_fetch_assoc($result);
            //$row = $result->fetch_array();

            //Our fetched data as variables
            $product = $row['product'];
            $qty= $row['qty'];
            $unitPrice = $row['unitPrice'];
            $totalPrice = $qty*$unitPrice;





        }

}
?>
    <h3>Stock</h3>
    <form action="process.php" method="get">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <input class="form-control" type="text" name="product" placeholder="Enter a Product" value="<?php echo $product ?>">
            <input class="form-control" type="number" value="<?php echo $qty; ?>" name="qty" placeholder="Enter Quantity">
            <input class="form-control" type="number" value="<?php echo $unitPrice; ?>" name="unitPrice" placeholder="Enter Unit Price">
            
            <?php 
                if($update==true):
            ?>
                    <input class="form-control btn btn-info" type="submit" name ="update" value="Update">
            <?php else: ?>

                    <input class="form-control btn btn-success" type="submit" name ="add" value="Save">
             <?php endif;?>
            </div>
        
    </form>
</div>
<?php include_once "footer.php"; ?>

</body>
</html>