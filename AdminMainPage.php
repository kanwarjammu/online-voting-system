<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<style>

*{
    font-family: Roboto
    margin: 0;
    padding: 0;
}
header{
    text-align:center;
    font-size: 20px;
    font-family: sans-serif;
    background-image: url("./Images/Vote4.jpeg");
    padding: 10px;
}

h1{
    text-decoration: underline;
    margin-bottom: 20px;
}


.list li {
    display: inline-block;
    text-decoration: none;
    font-size: 16px;
    margin: 0 10px ;
}

        body{
            background:lightblue;
        }
#div1{
        width:400px;
        }
        #div2{
        border:1px solid silver;
        padding:1px;margin:1px;
        width:350px;
        }
form,table{
        width: max-content;
        display: block;
        margin: auto;
        font-size: 20px;
}
td{
    width: 100px
}
.info{
        width: 300px;
        border: 15px solid green;
        padding: 50px;
        padding-left: 10px;
        padding-top: 0%;
        text-align: left;
  
    
        font-size: 10px;
        margin: auto;
        
        background: lightsteelblue;
        }
        .nav-bar p{
            /* border: 5px solid red; */
           width: max-content;
           margin: auto;
           padding:0 72px ;
            text-align: center;
            background: coral;
            font-size: 40px;
            margin-top:35px ;

        }
        body{
        
            background-image: url("./Images/Vote3.jpeg");
        }

input[type='submit']{
    width: 100%;
}

</style>
<body>
        
      <form action="#" method="get">
      <header>
                <h1>
                    Voting System
                </h1>
                <ul class="list">
                <li><input type="submit" value="Manage Administrators" name="Manadm"></li>
                <li><input type="submit" value="Manage Position" name="Manpos"></li>
                <li><input type="submit" value="Manage Candidate" name="Mancan"></li>
                <li><input type="submit" value="Poll Results" name="poll"></li>
                <li><input type="submit" value="Logout" name="Logout"></li>
                </ul>
            </header>
    </form>
 <?php
 include_once 'Candidate.php';
 require_once  'DBConfig.php';
 $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 
 
 
    if (isset($_GET['poll'])) {
        
        $pos = new Position();
        
        $allPosition = $pos->getPosition($connection);
        echo '
<center>
        <h1>position</h1>
        <form method="GET" action="Main.php ">
            <fieldset style="padding:10px;margin:10px; display:inline">
<label for ="Select Position">Select Position</label>
            <select name="cid">';
        foreach ($allPosition as $onePosition){
            
            $name = $onePosition->getPositionName();
            $id = $onePosition->getPositionID();
            echo"<option value=". $id. ">".$name."</option>";
            
        }
        echo '</select>
                    <input style="width:100px" type="submit" value="See Results" name="res"/></td>
            
               </fieldset>
</form>
    </center>';
        
        
        
        
    }
 
 
     if (isset($_GET['Manadm'])) {
            
            echo '
<center>
        <form method="GET" action="Functions.php ">
            

                <table style="margin-top:10px; ">
                    <tr><h3>Update Profile</h3></tr>
                            <tr>
                        <td><label>First Name: </label></td>
                        <td><input type="text" name="first"/></td></tr>
                        <tr><td><label>Last Name: </label></td>
                        <td><input type="text" name="last"/></td></tr>
                        <tr><td><label>New Password: </label></td>
                        <td><input type="password" name="pswd"/></td></tr>
<tr><td colspan="3"><label>Please Enter Email to confirm update</label></td></tr>
<tr><td><label>Email: </label></td>
                        <td><input type="text" name="email"/></td></tr>
                        <tr><td>
                        </td></tr>
                        <tr>
                        <td></td>
                        <td>
                  <input type="submit" value="Update" name="updateaccount"/></td>
                    </tr>
                </table>

</form>
    </center>
';
     }
        
      
            if (isset($_GET['account'])) {
                
                echo '
<center>
        <h1>Sign Up</h1>
        <form method="GET" action="Functions.php ">
            
     
                <table style="margin-top:10px; ">
                    <tr>
                        <td><label>First Name: </label></td>
                        <td><input type="text" name="firstname"/></td></tr>
                       <tr> <td><label>Last Name: </label></td>
                        <td><input type="text" name="lastname"/></td></tr>
                        <tr><td><label>Password: </label></td>
                        <td><input type="password" name="password"/></td></tr>
                        <tr><td><label>Email: </label></td>
                        <td><input type="text" name="email"/></td></tr>
                    <tr><td>
                        </td></tr>
                        <tr>
                        <td></td>
                        <td>
                  <input type="submit" value="signup" name="signup"/></td>
                    </tr>
                </table>
     
        
</form>
    </center>
';
            }
            if (isset($_GET['Manpos'])) {
                
                echo '
<center>
        <h1>Add Positions</h1>
        <form method="GET" action="Functions.php ">
            
                                
                <table style="margin-top:10px; ">
                    <tr>
                        <td><label>Position ID: </label></td>
                        <td><input type="text" name="id"/></td>
                        <td><label>Position Name: </label></td>
                        <td><input type="text" name="posname"/></td></tr>
                        <tr>
                        <td></td>
                        <td>
                  <input type="submit" value="Add" name="addposition"/></td>
                    </tr>
                </table>
                                
        
</form>
    </center>
';}
            if (isset($_GET['Mancan'])) {
                //printCandidate($connection);
                $can = new Candidate();
                $can->printPositions($connection);
            }
            if (isset($_GET['Logout'])) {
                
                header("location: index.php");
            }
        ?>
</body>
</html>
