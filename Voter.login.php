<?php
include_once 'DBConfig.php';
class Voter{
    private $VoterID;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Password;
    
    function __construct($Email=null,$Password=null,$FirstName=null,$LastName=null){
        
        $this->VoterID = rand(1000,9999);
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Password = $Password;
        $this->Email = $Email;
    }
    public function getVoterID(){return $this->VoterID;}
    public function getFirstName(){return $this->FirstName;}
    public function getLastName(){return $this->LastName;}
    public function getEmail(){return $this->Email;}
    public function getPassword(){return $this->Password;}
    
    public function setVoterID($VoterID){$this->VoterID=$VoterID;}
    public function setFirstName($FirstName){$this->FirstName=$FirstName;}
    public function setLastName($LastName){$this->LastName=$LastName;}
    public function setEmail($Email){$this->Email=$Email;}
    public function setPassword($Password){$this->Password=$Password;}
    
    public function signup($connection){
        $VoterID = $this->VoterID;
        $FirstName = $this->FirstName;
        $LastName = $this->LastName;
        $Email= $this->Email;
        $Password = $this->Password;
        $sqlStmt = "insert into voterdb values($VoterID,'$FirstName','$LastName','$Email','$Password')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }

public function voterlogin($connection){
    $sqlStmt = "Select * from voterdb where Email=? and Password=?";
    $prepare = $connection->prepare($sqlStmt);
    //--2
    $prepare->execute([$this->Email,$this->Password]);
    //--3
    
    $result = $prepare->fetchAll();
    

    $tobj = "";
    foreach ($result as $val) {
        if($result>0){
            $VoterID= $val["VoterID"];
            $FirstName = $val["FirstName"];
            $LastName = $val["LastName"];
            $Email = $val["Email"];
            $Password = $val["Password"]; 
            $tobj = new Voter($VoterID,$FirstName,$LastName,$Email,$Password);
        }
    }
    return $tobj;

    }
    public function updateprofile($connection){
        $Email=$this->Email;
        $FirstName=$this->FirstName;
        $LastName=$this->LastName;
        $Password=$this->Password;
        
        $sqlStmt= "update voterdb set FirstName=? ,LastName=? ,Password=? where Email =?";
        $prepare = $connection->prepare($sqlStmt);
         $result =  $prepare->execute([$FirstName,$LastName,$Password,$Email]);
        return $result;
    }

}