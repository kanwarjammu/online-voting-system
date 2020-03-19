<?php
require_once 'Voter.login.php';
require_once 'Admin.login.php';
require_once 'Main.php';
require_once 'Position.php';
require_once 'Candidate.php';
//require_once 'DBConfig.php';

function signup($connection){
    
    $FirstName = $_GET['firstname'];
    $LastName = $_GET['lastname'];
    $Email = $_GET['email'];
    $Password = $_GET['password'];
  //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $voter1 = new Voter($Email,$Password,$FirstName,$LastName);
    $result = $voter1->signup($connection);
    if($result==true){
        $id=$voter1->getVoterID();
        echo "your voter id is $id.<br/>";}
        else{
            $error=$connection->errorInfo();
            echo $error[2]."<br/>";
        }
        
}

function adminLogin($connection){
    $email = $_GET['username'];
    $pass = $_GET['password'];
    //$connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $admin = new Admin($email,$pass);
    $admin = $admin->adminLogin($connection);
   
    if ($admin != null) {
        header("Location: ./AdminMainPage.php");
    }
    else{
        echo "failed";
    }
}
function voterlogin($connection){
        $Email = $_GET['user'];
        $Pass = $_GET['pass'];
      //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $voter = new Voter($Email,$Pass);
       
        $voter = $voter->voterlogin($connection);
        if ($voter != null) {
            header("Location: ./VoterMainPage.php");
        }
        else{
           echo "failed";
        }  
}
function updateprofile($connection){
    $FirstName = $_GET['first'];
    $LastName = $_GET['last'];
    $Password = $_GET['pswd'];
    $Email = $_GET['email'];
    //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $voter2 = new Voter($Email,$Password,$FirstName,$LastName);
    
    $voter2 = $voter2->updateprofile($connection);
    if($voter2==true){
        echo "The voter with email is updated successfully <br/>";
        header("Location: ./VoterMainPage.php");
    }
    else{
            $error=$connection->errorInfo();
            echo $error[2]."<br/>";
        }
}


// function printCandidate($connection){
    
//     $pos = new Position();
    
//     $allPosition = $pos->getPosition($connection);
    
    
    
    
//     echo '
// <center>
//         <h1>position</h1>
//         <form method="GET" action="Main.php ">
//             <fieldset style="padding:10px;margin:10px;background: orange; display:inline">
// <label for ="Select Position">Select Position</label>
//             <select>';
//     foreach ($allPosition as $onePosition){
        
//         $name = $onePosition->getPositionName();
//         $id = $onePosition->getPositionID();
//         echo"<option value=". $id. ">".$name."</option>";
        
//     }
    
//     echo '</select>
// <input style="width:100px" type="submit" value="See Candidates" name="see"/></td>
        
//                </fieldset>
// </form>
//     </center>';
    
// }
function printlist($connection)
{
    
    $id = $_GET['cid'];
//     echo $id;
    $can = new Candidate();
    $allCandidate = $can->getCandidate($connection,$id);
//     print_r($allCandidate);

    echo '
 <center>
         <h1>candidate</h1>
         <form method="GET" action="Main.php ">
             ';
           
         foreach ($allCandidate as $oneCandidate){
    
             $id = $oneCandidate->getCandidateID();
           $name = $oneCandidate->getCandidateName();
   
            echo "<span>$name :</span>   <button value='$id' name='vote'>Vote</button></br>";         
    
         }

     echo ' 
                  
     </form>
         </center>';   
    
}

function printVotes($connection){
    
    
    $id = $_GET['cid'];

    $can = new Candidate();
    
    
    $allCandidate = $can->printAllVotes($connection,$id);

    echo '
 <center>
         <h1>candidate votes</h1>';
    
    foreach ($allCandidate as $oneCandidate){
        
        $name = $oneCandidate->getCandidateName();
        $votes = $oneCandidate->getVotes();
        
        echo "<span>$name : $votes</span></br>";      
    }
    
    echo ' </center>'; 
   
}

function vote($connection){
    
    
    $id = $_GET['vote'];

    
    $can = new Candidate();
    $allCandidate = $can->voteCandidate($connection,$id);
    header("Location: ./VoterMainPage.php?position=Position");
    
}


function updateaccount($connection){
    $Firstname = $_GET['first'];
    $Lastname = $_GET['last'];
    $Password = $_GET['pswd'];
    $Email = $_GET['email'];
    //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $admin2 = new admin($Email,$Password,$Firstname,$Lastname);
    
    $admin2 = $admin2->updateaccount($connection);
    if($admin2==true){
        echo "The voter with email is updated successfully <br/>";
        header("Location: ./AdminMainPage.php");
       
    }
    else{
        $error=$connection->errorInfo();
        echo $error[2]."<br/>";
    }
}
function addposition($connection){
    
    $PositionID = $_GET['id'];
    $PositionName = $_GET['posname'];
  
    //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $pos = new Position($PositionID,$PositionName);
    $result = $pos->addposition($connection);
    if($result==true){
        header("Location: ./AdminMainPage.php");}
        else{
            $error=$connection->errorInfo();
            echo $error[2]."<br/>";
        }
        
}
function addcandidate($connection){
            
            $CandidateName = $_GET['caname'];
            $positionID = $_GET['capos'];
            echo $CandidateName;
            //  $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
            $can = new Candidate("",$CandidateName,"",$positionID,"");
            $result = $can->addcandidate($connection);
            if($result==true){
                header("Location: ./AdminMainPage.php");}
                else{
                    $error=$connection->errorInfo();
                    echo $error[2]."<br/>";
                }
                
}