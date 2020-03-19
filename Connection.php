<?php
require_once 'dbconfig.php';
if (!mysqli_connect_errno())
{
    echo "You are connected to $dbname database <br/>";
    header("location:manipulateDatabase.php");
}
else
{
    echo "You are not connected to $dbname database <br/>";
    
    header("location:errorDatabase.php");
}