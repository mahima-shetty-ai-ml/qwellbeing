<?php
    session_start();
    
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        include 'connect.php ';

        $email_address = $_POST['email-address'];  
        $password = $_POST['password'];  
        $sql = "select * from patients where email_address = '$email_address'"; 

        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);  
          
        if($count == 1 && password_verify($password,$row['password'])){  
            echo "<script>
                            alert('Login successful');
                            // window.location.href='./p_dashboard.php';
                </script>";
            
            $_SESSION['emailaddress'] = $email_address;
            
            $getid = "Select id,first_name, last_name from patients where email_address='{$_SESSION['emailaddress']}'";
            $result = $conn->query($getid);


            $row = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['id'] = $row["id"];

            $_SESSION["fname"] = $row["first_name"];
            $_SESSION["lname"] = $row["last_name"];

            echo "<script>
                            window.location.href='./p_dashboard.php';
                </script>";
        }  
        else{  
            echo "<h5> Login failed. Invalid username or password.</h5>";  
        }      

        // $getid = "Select id from patients where email_address='{$_SESSION['emailaddress']}'";
        // $result = $conn->query($getid);


        // $row = $result->fetch_array(MYSQLI_ASSOC);
        // printf("%s\n", $row["id"]);
        // $id = mysqli_result($result, 0, "id");
        // $_SESSION['id'] = $id;
        
        
        

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    <title>Q-Wellbeing | Login</title>
    <!--Jquery, CSS, JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


    <!--CSS file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    
                <a class="navbar-brand" href="./index.html">Q-<span style="color:#007AF3 ;">WELLBEING</span></a>
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
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail address: </label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control" name="email-address" required autofocus>
                                    </div>
                                </div>

                            <br>
    
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password: </label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div><br>
    
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                Don't have an account? <a href="register.php">Register</a>
                                            </label>
                                        </div>
                                    </div>
                                </div><br>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    </main>
</section>

</body>
</html>