<?php
session_start();

$server = new mysqli("localhost", "root", "", "crud") or die("Failed to connect!");
?>