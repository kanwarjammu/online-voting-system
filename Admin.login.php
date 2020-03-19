<?php
include 'index.php';
include_once 'DBConfig.php';
class Admin{
    private $email;
    private $password;
    private $Firstname;
    private $Lastname;
    private $adminID;
    
    function __construct( $Email=null,$Password=null,$Firstname=null,$Lastname=null){
        $this->email = $Email;
        $this->password = $Password;
        $this->Firstname = $Firstname;
        $this->Lastname = $Lastname;
        $this->adminID = rand(1000,9999);
        }
        
    public function getemail(){return $this->email;}
    public function getpassword(){return $this->password;}
    public function getFirstname(){return $this->Firstname;}
    public function getLastname(){return $this->Lastname;}
    public function getadminID(){return $this->adminID;}
    
    public function setemail($email){$this->email=$email;}
    public function setpassword($Password){$this->password=$Password;}
    public function setFirstname($Firstname){$this->Firstname=$Firstname;}
    public function setLastname($Lastname){$this->Lastname=$Lastname;}
    public function setadminID($adminID){$this->adminID=$adminID;}
    
    public function adminLogin($connection){
        $sqlStmt = "Select * from admindb where Email=? and Password=?";
        $prepare = $connection->prepare($sqlStmt);
        //--2
        $prepare->execute([$this->email,$this->password]);
        //--3
        
        $result = $prepare->fetchAll();
    
        
        $tobj = "";
        foreach ($result as $val)
        if($result>0){
            $adminID= $val["adminID"];
            $Firstname = $val["Firstname"];
            $Lastname = $val["Lastname"];
            $email = $val["Email"];
            $password = $val["Password"];
            
            $tobj = new Admin($adminID,$Firstname,$Lastname,$email,$password);
        }
        return $tobj;
    }
    public function updateaccount($connection){
        $email=$this->email;
        $Firstname=$this->Firstname;
        $Lastname=$this->Lastname;
        
        $password=$this->password;
        
        
        $sqlStmt= "update admindb set Firstname=? ,Lastname=? ,password=? where email =?";
        $prepare = $connection->prepare($sqlStmt);
        $result =  $prepare->execute([$Firstname,$Lastname,$password,$email]);
        return $result;
    }
    
    }
    



