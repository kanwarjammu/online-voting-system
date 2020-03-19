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
                <li><input type="submit" value="Admin" name="submit"></li>
                <li><input type="submit" value="SignUp" name="signUp"></li>
                <li><input type="submit" value="Contact US" name="contact"></li>
                </ul>
            </header>
    </form>
 <?php
     if (isset($_GET['signUp'])) {
            
            echo '
<center>
        <h1>Sign Up</h1>
        <form method="GET" action="Functions.php ">
          

                <table>
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
<tr><td colspan = "2"><label>if you already have account</label><form><input type="submit" value="Login" name="VLogin"/></form></td></tr>
                </table>
       
     
</form>
    </center>
';
     }
        if (isset($_GET['submit'])) {
            
            echo '
<center>
        <h1>Admin Login</h1>
        <form method="GET" action="Functions.php ">
            
            
                <table style="margin-top:10px; ">
<tr><td><label>Email: </label></td>
                        <td><input type="text" name="username"/></td></tr>
                        <tr><td><label>Password: </label></td>
                        <td><input type="password" name="password"/></td></tr>
                        
                    <tr><td>
                        </td></tr>
                        <tr>
                        <td></td>
                        <td>
                  <input type="submit" value="login" name="adminLogin"/></td>
                    </tr>
                </table>
            
       
</form>
    </center>';
        }
        if (isset($_GET['VLogin'])) {
            
            echo '
<center>
        <h1>Voter Login</h1>
        <form method="GET" action="Functions.php ">
          
                
                <table style="margin-top:10px; ">
<tr><td><label>Email: </label></td>
                        <td><input type="text" name="user"/></td></tr>
                        <tr><td><label>Password: </label></td>
                        <td><input type="password" name="pass"/></td></tr>
                
                    <tr><td>
                        </td></tr>
                        <tr>
                        <td></td>
                        <td>
                  <input type="submit" value="login" name="voterlogin"/></td>
                    </tr>
                </table>
                
    
</form>
    </center>';
        }
        if (isset($_GET['contact'])) {
            
            echo '
<center>
        <nav class="nav-bar">
            <p>CONTACT US</p></nav>

        <article class="info">
            
            
            <h2>NAME:DAVINDER SHARMA</h2>
            <h1>PHONE : 9876567345</h1>
            <H2>E-MAIL :davinder.sharma@gmail.com</H2>
            <H3>ADDRESS:2000 Saint-Catherine St W, Montreal, </H3>
        </article>

       
    
            <article class="info">
                
                
                <h2>NAME:KANWARPAL SINGH</h2>
                <h1>PHONE : 4567898765</h1>
                <H2>E-MAIL :kanwar.jammu@gmail.com</H2>
                <H3>ADDRESS:2000 Saint-Catherine St W, Montreal, </H3>
            </article>
            <!-- ============3=========== -->
           
        
                <article class="info">
                    
                    
                    <h2>NAME:MANDEEP KAUR</h2>
                    <h1>PHONE : 5678776587</h1>
                    <H2>E-MAIL :mandeepKaur@gmail.com</H2>
                    <H3>ADDRESS:2000 Saint-Catherine St W, Montreal, </H3>
                </article>
    </center>';
        }
        ?>
</body>
</html>
