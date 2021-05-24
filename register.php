<?php
    session_start();
    // $exists=false;
    // define("Login&Register",true);
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        include 'connect.php ';
        
       
        $first_name = mysqli_real_escape_string($conn,strip_tags($_POST["fname"]));
        
        $last_name = mysqli_real_escape_string($conn, strip_tags($_POST["lname"]));
        $age =   $_POST["age"]; 
        $gender = $_POST["gender"]; 
       
        $email_address = mysqli_real_escape_string($conn, strip_tags($_POST["email-address"]));
        $password = $_POST["password"]; 
        $conpassword = $_POST["conpassword"];
                
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        //password criteria is not satisfied
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
            echo "<script>
            alert('Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.');
            window.location.href='./register.php';
        </script>";
            
            // echo "Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.";
        }

        //invalid email format
        else if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
            echo "<script>
            alert('Invalid email format');
            window.location.href='./register.php';
        </script>";
            
        } 
        else{
            $sql = "Select * from patients where email_address='$email_address'";
            
            $result = mysqli_query($conn, $sql);
            
            $num = mysqli_num_rows($result); 
            
            //new user
            if($num == 0) {
                //passord matches
                if(($password == $conpassword) && $exists==false) {
            
                    $hash = password_hash($password, 
                                        PASSWORD_DEFAULT);
                        
                    // Password Hashing is used here. 
                    $sql = "INSERT INTO `patients` ( `email_address`,`first_name`, `last_name`, `age`, `gender`, `password`, `date`) VALUES ('$email_address', '$first_name' ,'$last_name','$age','$gender','$hash', current_timestamp())";
            
                    
                    $result = mysqli_query($conn, $sql);
                    
                    // if(!$result){
                    //     echo "<script>
                    //     alert('error in gender  $gender');

                    //     window.location.href='./register.php';
                    // </script>";
                    // }
                    
                    if ($result) {
                    
                        echo "<script>
                            alert('You have been sucessfully registered');
                            // window.location.href='./p_dashboard.php';
                        </script>";

                        $_SESSION["emailaddress"] = $email_address;
                        
                        $getid = "Select id, first_name, last_name from patients where email_address='{$_SESSION['emailaddress']}'";
                        $result = $conn->query($getid);


                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['fname'] = $row["first_name"];
                        $_SESSION["lname"] = $row["last_name"];

                        echo "<script>
                                        window.location.href='./p_dashboard.php';
                            </script>";

                    }
                } //end if password
                else { 
                    
                    echo "<script>
                        alert('Passwords do not match');
                        window.location.href='./register.php';
                    </script>"; 
                }      
            }// end if num==0
            
            //user with same emailid already exists
            if($num>0) 
            {
                
                echo "<script>
                    alert('User with same emailid already exists');
                    window.location.href='./register.php';
                </script>"; 
            } 
            
        }//end else 
    }//end if
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    <title>Q-Wellbeing | Register</title>
    <!--Jquery, CSS, JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <!-- Notification -->
    <script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
    OneSignal.init({
        appId: "4eaf4807-a545-4c53-b99b-a1ec4b1fbfdc",
    });
    });
    </script>
    <!--CSS file-->
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>

    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    
                <a class="navbar-brand" href="index.html">Q-<span style="color:#007AF3 ;">WELLBEING</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="./index.html">Guide</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./virtual_chatbot.html">Virtual Chatbot</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Emergency
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="https://covidrelief.glideapp.io/">Resources</a></li>
                      <li><a class="dropdown-item" href="https://covidrelief.glideapp.io/dl/ewAiAHQAIgA6ADAALAAiAHMAIgA6ACIAbQBlAG4AdQAtADAAOABhADAAOQA1ADUAYwAtADMAMwAyADUALQA0ADIAMgAwAC0AOAA4AGMAOAAtADEANgA0ADcAMgBlADEAMAA3ADcAYQAwAC0ANAAwADQAYwBjADIAOABkADAAMgAxADEAZQA4AGMAYQBkADUAMwBhAGMAMgA3ADgAZAAzADgAZgBiAGMAMQAxACIALAAiAHIAIgA6ACIAMABuAHYAegBEAGUAVgB3AFQAaABPADcAVgBuADMAMQA4AFAANgAxAHYAZwAiACwAIgBuACIAOgAiAFMAdABhAHQAZQB3AGkAcwBlACAAQwBvAHYAaQBkACAASABlAGwAcABsAGkAbgBlAHMAIgB9AA%3D%3D">Contact numbers</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link active  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="./login.php">Covid Tracker</a></li>
                      <li><a class="dropdown-item" href="./login.php">Login</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>   

<!--Login form-->
<section style="margin: 60px;">
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                
                <div class="col-md-6">
                    
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form action="register.php" method="POST" onsubmit="return validation()">
                            <div class="form-group row">
                                    <label for="fname" class="col-md-4 col-form-label text-md-right">First name: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="fname" class="form-control" name="fname" required autofocus>
                                        <span id="fnamee"></span>
                                    </div>
                                </div><br>
                                

                                <div class="form-group row">
                                    <label for="lname" class="col-md-4 col-form-label text-md-right">Last name: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="lname" class="form-control" name="lname" required autofocus>
                                        <span id="lnamee"></span>
                                    </div>
                                </div><br>
                                
                                <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">Age: </label>
                                    <div class="col-md-6">
                                        <input type="text" id="age" class="form-control" name="age" required autofocus>
                                        <span id="agee"></span>
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">Gender: </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" value = "male" name="gender" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" value = "female" name="gender" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" value = "other" name="gender" id="other">
                                        <label class="form-check-label" for="other">
                                            Other
                                        </label>
                                        </div>
                                    </div>
                                </div><br>

                                
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail address: </label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control" name="email-address" required autofocus>
                                    </div>
                                </div><br>
                                

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password: </label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        <span id="passs"></span>
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <label for="conpassword" class="col-md-4 col-form-label text-md-right">Confirm Password: </label>
                                    <div class="col-md-6">
                                        <input type="password" id="conpassword" class="form-control" name="conpassword" required>
                                        <span id="conpasss"></span>
                                    </div>
                                </div><br>
    
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                Already have an account? <a href="login.php">Login</a>
                                            </label>
                                        </div>
                                    </div>
                                </div><br>
    
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>                                
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    </main>
</section>

<script>
    function validation()
{
var fname = document.getElementById('fname').value;
var lname = document.getElementById('lname').value;
var age = document.getElementById('age').value;
var password = document.getElementById('password').value;
var conpass = document.getElementById('conpassword').value;
//username
if (user== "")
{
document.getElementById('userr').innerHTML="Username can't
be empty";
return false;
}
if (user.length<5)
{
document.getElementById('userr').innerHTML="Username should
be more than 5 characters";
return false;
}
else{
document.getElementById('userr').innerHTML="";
}
//password
if (pass == "")
{
document.getElementById('passs').innerHTML="Password can't
be empty";
return false;
}
if (pass.length<8)
{
document.getElementById('passs').innerHTML="Password should
be more than 8 characters";
return false;
}
if (pass.search(/[0-9]/)==-1)
{
document.getElementById('passs').innerHTML="Password should
contain atleast 1 number";
return false;
}
if (pass.search(/[a-z]/)==-1)
{
document.getElementById('passs').innerHTML="Password should
contain atleast 1 lowercase character";
return false;
}
if (pass.search(/[A-Z]/)==-1)
{
document.getElementById('passs').innerHTML="Password should
contain atleast 1 uppercase character";
return false;
}
if (pass.search(/[@\!\$\%\^\&\(\)\_\-\+\=\<\>\?\.]/)==-1)
{
document.getElementById('passs').innerHTML="Password should
contain atleast 1 special character";
return false;
}
if (pass.search(/[#\,\*]/) != -1)
{
document.getElementById('passs').innerHTML="Password can't
contain # , * ";
return false; }
else{
document.getElementById('passs').innerHTML="";
}
//confirm password
if (conpass != pass)
{
document.getElementById('conpasss').innerHTML="Password
isn't matching";
return false;
}
else{
document.getElementById('conpasss').innerHTML="";
}
//mobile
if (mobile == "")
{
document.getElementById('mobilee').innerHTML="Mobile no.
can't be empty";
return false;
}
if (mobile.length<10)
{
document.getElementById('mobilee').innerHTML="Mobile no.
can't be less than 10 digits";
return false;
}
if (mobile.length>10)
{
document.getElementById('mobilee').innerHTML="Mobile no.
can't be more than 10 digits";
return false;
}
else{
alert("Submitted successfully...!");
}
}
</script>

</body>
</html>