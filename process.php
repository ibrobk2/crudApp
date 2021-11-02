<?php

include "server.php";

//Default Variables declarations
$id = 0;
$product = "";
$qty = "";
$unitPrice = "";

//***************Insert Section****************

if(isset($_GET['add'])){
    //variables declartion
    $_SESSION['msg'] = "";
    $product = $_GET['product'];
    $qty = $_GET['qty'];
    $unitPrice = $_GET['unitPrice'];

    $totalPrice = $qty*$unitPrice;


    $query = "INSERT INTO stock (product, qty, unitPrice, totalPrice) VALUES('$product', '$qty', '$unitPrice', '$totalPrice')";
    $result = mysqli_query($server, $query);
    //$result = $server->$query;


    if($result){
//Creating a session variables
        $_SESSION['msg'] = "Item Added Successfully...";
        $_SESSION['msg_type'] = "success";
            
        header("location: index.php");

    }

   
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = "DELETE FROM stock WHERE id='$id'";
        $result = mysqli_query($server, $query);

        if($result){
            $_SESSION['msg'] = "Item Deleted Successfully...";
            $_SESSION['msg_type'] = "danger";
                
            header("location: stock.php");
        }
        
    }
//**************Update Section***************


    if(isset($_GET['update'])){
    
    //variables declartion
    $_SESSION['msg'] = "";
    $id = $_GET['id'];
    $product = $_GET['product'];
    $qty = $_GET['qty'];
    $unitPrice = $_GET['unitPrice'];

    $totalPrice = $qty*$unitPrice;


    $query = "UPDATE stock SET product='$product', qty='$qty', unitPrice='$unitPrice', totalPrice='$totalPrice' WHERE id=$id";
    $result = mysqli_query($server, $query);
    //$result = $server->$query;


    if($result){
//Creating a session variables
        $_SESSION['msg'] = "Item Updated Successfully...";
        $_SESSION['msg_type'] = "success";
            
        header("location: stock.php");

    }


    }


?>