<?php
require_once 'DBConfig.php';
require_once 'Functions.php';
require_once 'Voter.login.php';
require_once 'Admin.login.php';
require_once 'Position.php';

try{
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    if(isset($_GET['voterlogin'])){
        voterlogin($connection);
    }
    if (isset($_GET['signup'])){
        signup($connection);
    }
    if(isset($_GET['adminLogin'])){
        adminLogin($connection);
    }
    if(isset($_GET['updateprofile'])){
        updateprofile($connection);
    }
    if(isset($_GET['see'])){
        printlist($connection);
    }
    if (isset($_GET['vote'])) {
        vote($connection);
    }
    if(isset($_GET['updateaccount'])){
        updateaccount($connection);
    }
    if(isset($_GET['addposition'])){
        addposition($connection);
    }
    
    if (isset($_GET['res'])) {
        
        printVotes($connection);     
    }
    if(isset($_GET['addcandidate'])){
        addcandidate($connection);
    }
    
}
catch (Exception $error){
    echo $connection->Error[2];
}