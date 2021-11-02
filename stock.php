<?php include_once("server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>

<?php

if(isset($_SESSION['msg'])): ?>
<div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
    <p style="text-align:center; font-weight:bold;"><?php echo $_SESSION['msg'];  ?></p>
</div>
<?php session_unset(); ?>
<?php endif; ?>

    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <?php 
                $query = "SELECT * FROM stock";
                $result = mysqli_query($server, $query);
                 
                
                while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['unitPrice']; ?></td>
                    <td><?php echo $row['totalPrice']; ?></td>
                    <td colspan="2">
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>

        </div>
    </div>
   <?php include_once "footer.php"; ?>
    
</body>
</html>