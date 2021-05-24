<!-- data visualisation php code -->
<?php 
  session_start();
  // if(!defined('Login&Register'))
  //   {
  //       header('location:login.php');
  //       die();
  //   }
  if(empty($_SESSION['emailaddress']))
  {
      header('location: login.php');
  }
  $id = ($_SESSION['id']) ;
  include 'connect.php';

  $temperature = '';
  $heartrate = '';
  $oxygen = '';

  //query to get data from the table
  $sql = "SELECT * FROM `dailyupdate` where id = $id ";
    $result = mysqli_query($conn, $sql);

  //loop through the returned data
  while ($row = mysqli_fetch_array($result)) {

    $temperature = $temperature . '"'. $row['temperature'].'",';
    $heartrate = $heartrate . '"'. $row['heartrate'] .'",';
    $oxygen = $oxygen . '"'. $row['oxygen'] .'",';
  }

  $temperature = trim($temperature,",");
  $heartrate = trim($heartrate,",");
  $oxygen = trim($oxygen,",");


//irst name and last name
  $fname = ($_SESSION["fname"]);
  $lname = ($_SESSION["lname"]);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Q-Wellbeing | Patient dashboard</title>
	<!-- Load Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">

  <!--Jquery, CSS, JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<script src = "pdf.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>	
  
  <!-- <style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #E8E9EB;
				background: #222;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style> -->

</head>
<body>




<!--Daily tracker Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Covid tracker - Daily Update</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="./dailyupdate.php" method="POST">
              <div class="form-group row">
                <label for="temperature" class="col-md-4 col-form-label text-md-right">Temperature: </label>
                <div class="col-md-6">
                  <input type="text" id="temperature" class="form-control" name="temperature" required autofocus>
                </div>
              </div><br>
              <div class="form-group row">
                <label for="oxygen" class="col-md-4 col-form-label text-md-right">Oxygen level: </label>
                <div class="col-md-6">
                  <input type="text" id="oxygen" class="form-control" name="oxygen" required autofocus>
                </div>
              </div><br>
              <div class="form-group row">
                <label for="heartrate" class="col-md-4 col-form-label text-md-right">Heart rate: </label>
                <div class="col-md-6">
                  <input type="text" id="heartrate" class="form-control" name="heartrate" required autofocus>
                </div>
              </div><br>


              <div class="form-group row">
                <label for="symptoms" class="col-md-4 col-form-label text-md-right">Symptoms: </label>
                <div class="col-md-6">
                  <label>Severe symptoms</label><br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="severesymptoms" name="breathingproblem">
                    <label class="form-check-label" for="severesymptoms">
                      Breathing problem
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="severesymptoms" name="speakingproblem">
                    <label class="form-check-label" for="severesymptoms">
                      Speaking problem
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="severesymptoms" name="chestpain">
                    <label class="form-check-label" for="severesymptoms">
                      Chest pain
                    </label>
                  </div>
                  <label>Moderate Severe symptoms</label><br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="moderatesymptoms" name="sorethroat">
                    <label class="form-check-label" for="moderatesymptoms">
                      Sore throat
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="moderatesymptoms" name="lossoftasteandsmell">
                    <label class="form-check-label" for="moderatesymptoms">
                      Loss of taste and smell
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="moderatesymptoms" name="conjunctivitis">
                    <label class="form-check-label" for="moderatesymptoms">
                    Conjunctivitis
                    </label>
                  </div><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="moderatesymptoms" name="discolourationoffingers">
                    <label class="form-check-label" for="moderatesymptoms">
                      Discolouration of Fingers
                    </label>
                  </div>
                  <label>Common symptoms</label><br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="commonsymptoms" name="fever">
                    <label class="form-check-label" for="commonsymptoms">
                      Fever
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="commonsymptoms" name="drycough">
                    <label class="form-check-label" for="commonsymptoms">
                      Dry Cough
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" id="commonsymptoms" name="tiredness">
                    <label class="form-check-label" for="commonsymptoms">
                    Tiredness
                    </label>
                  
                  </div>
                  
              
                </div>
              </div>


<br>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="Submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- extra code to crete neew enr -->

<!--end of daily tracker modal-->

<!--login moadal-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Covid tracker - Daily Update</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="login.php" method="POST">
              <div class="form-group row">
                  <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail address: </label>
                  <div class="col-md-6">
                      <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
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

              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Login
                  </button>
                  <a href="#" class="btn btn-link">
                      Forgot Your Password?
                  </a>
              </div>
      </div>
      </form>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>






<!--Navbar-->
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
                <a class="nav-link" href="./index.html">Home</a>
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
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Covid Tracker - Update</a></li>
                  <li><a class="dropdown-item" href="./logout.php" >Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>    
<!--end of Navbar-->
<!--dashboard-->
<section style="margin: 20px;">
<div class="col-md-12 text-right mb-3" style="float: right;">
  <button style="margin:5px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactDoc">Contact a Doctor</button>
  <button style="margin:10px;"  class="btn btn-primary" id="download"> Download your report </button>
    </div>
  <div class="row"  id = "report" >
  
    <div>
      <div class="col-12 col-md-12 col-lg-12 col-xl-12" style="padding: 10px;">
        <div class="card" id="card1">
          <div class="card-header" >
            <h4><?php  echo "Welcome, ".$fname." ".$lname."!" ?></h4>  
          </div>
            <?php
            // session_start();
            $exists=false;
            $id = ($_SESSION['id']) ;
            $sql4 = "SELECT * FROM `dailyupdate`  WHERE id = $id  ";
            $result4 = mysqli_query($conn, $sql4);
            if(!$result4){
            // die("QUERY FAILED UPDATE.".mysqli_error($conn));
              echo "sql error";
            } 
            ?>


          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">Symptom/Days</th>
                    <th scope="col">1</th>
                    <th scope="col">2</th>
                    <th scope="col">3</th>
                    <th scope="col">4</th>
                    <th scope="col">5</th>
                    <th scope="col">6</th>
                    <th scope="col">7</th>
                    <th scope="col">8</th>
                    <th scope="col">9</th>
                    <th scope="col">10</th>
                    <th scope="col">11</th>
                    <th scope="col">12</th>
                    <th scope="col">13</th>
                    <th scope="col">14</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Breathing Problem</th>
                    <?php
                      
                      $count = mysqli_num_rows($result4); 
                  
                      while ($row = mysqli_fetch_assoc($result4) ) {
                    ?>
                    <td> 
                      <?php
                        echo $row['BreathingProblem'];
                      ?>
                    </td>
                    <?php
                     }//end of while
                     if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    ?>
                  </tr>
                  <tr>
                    <th scope="row">Speaking Problem</th>
                      <?php
                        $result4 = mysqli_query($conn, $sql4);
                        while ($row = mysqli_fetch_assoc($result4)) {
                      ?>
                      <td> 
                        <?php
                          echo $row['SpeakingProblem'];
                        ?>
                      </td>
                      <?php
                        }//end of while
                        if($count <14){
                          for ($i=$count;$i<14;$i++){
                            ?>
                              <td> 
                                <?php
                                  echo " \t--";
                                ?>
                              </td>
    
                            <?php
                          }//end of for loop $i
    
                         }//end of if
                        
                        // } end of if post
                      ?>
                  </tr>
                  <tr>
                    <th scope="row">Chest Pain</th>
                      <?php
                        $result4 = mysqli_query($conn, $sql4);
                        while ($row = mysqli_fetch_assoc($result4)) {
                      ?>
                      <td> 
                        <?php
                          echo $row['ChestPain'];
                        ?>
                      </td>
                      <?php
                        }//end of while
                        if($count <14){
                          for ($i=$count;$i<14;$i++){
                            ?>
                              <td> 
                                <?php
                                  echo " \t--";
                                ?>
                              </td>
    
                            <?php
                          }//end of for loop $i
    
                         }//end of if
                        
                        // } end of if post
                      ?>
                  </tr>
                  <tr>
                    <th scope="row">Sore throat</th>
                    <?php
                      $result4 = mysqli_query($conn, $sql4);
                      while ($row = mysqli_fetch_assoc($result4)) {
                    ?>
                    <td> 
                      <?php
                        echo $row['SoreThroat'];
                      ?>
                    </td>
                    <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                    ?>
                  </tr>
                  <tr>
                    <th scope="row">Loss of Taste and smell</th>
                    <?php
                      $result4 = mysqli_query($conn, $sql4);
                      while ($row = mysqli_fetch_assoc($result4)) {
                    ?>
                      <td> 
                        <?php
                                    echo $row['LossOfTasteAndSmell'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
                <tr>
                  <th scope="row">Conjunctivitis</th>
                  <?php
                  $result4 = mysqli_query($conn, $sql4);

                    while ($row = mysqli_fetch_assoc($result4)) {
                  ?>
                  <td> <?php
                                    echo $row['Conjunctivitis'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
                <tr>
                  <th scope="row">Discolouration of Fingers</th>
                  <?php
                  $result4 = mysqli_query($conn, $sql4);

                    while ($row = mysqli_fetch_assoc($result4)) {
                  ?>
                  <td> <?php
                                    echo $row['DiscolourationOfFingers'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
                <tr>
                  <th scope="row">Fever</th>
                  <?php
                  $result4 = mysqli_query($conn, $sql4);

                    while ($row = mysqli_fetch_assoc($result4)) {
                  ?>
                  <td> <?php
                                    echo $row['Fever'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
                <tr>
                  <th scope="row">Dry Cough</th>
                  <?php
                   $result4 = mysqli_query($conn, $sql4);

                    while ($row = mysqli_fetch_assoc($result4)) {
                  ?>
                  <td> <?php
                                    echo $row['DryCough'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
                <tr>
                  <th scope="row">Tiredness</th>
                  <?php
                  $result4 = mysqli_query($conn, $sql4);

                    while ($row = mysqli_fetch_assoc($result4)) {
                  ?>
                  <td> <?php
                                    echo $row['Tiredness'];
                        ?>
                  </td>
                  <?php
                    }//end of while
                    if($count <14){
                      for ($i=$count;$i<14;$i++){
                        ?>
                          <td> 
                            <?php
                              echo " \t--";
                            ?>
                          </td>

                        <?php
                      }//end of for loop $i

                     }//end of if
                    
                        // } end of if post
                  ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding: 10px;">
      <div class="card" id="card2">
        <div class="card-body" style="margin: 0px; padding: 3%;">
          <div class="container">	
            <h4>Temperature</h4>       
            <canvas id="chart" style="width: 100%; height: 65vh; background: #fffff; border: 1px solid #E6E6E6; border-radius:3px; padding:10px;  margin-top: 10px;"></canvas>

            <script>
              var ctx = document.getElementById("chart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['Day1','Day2','Day3','Day4','Day5','Day6','Day7','Day8','Day9','Day10','Day11','Day12','Day13','Day14'],
                      datasets: 
                      [{
                          label: 'Temperature',
                          data: [<?php echo $temperature; ?>],
                          backgroundColor: 'rgba(255,99,132,0.1)',
                          borderColor:'rgba(255,99,132)',
                          borderWidth: 3
                      }]
                  },
              
                  options: {
                      scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 100}]}},
                      tooltips:{mode: 'index'},
                      legend:{display: false, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}}
                  }
              });
            </script>
	       </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding: 10px;">
      <div class="card" id="card3">
        <div class="card-body" style="margin: 0px; padding: 3%;">
          <div class="container">	
            <h4>Heart Rate</h4>       
            <canvas id="chart1" style="width: 100%; height: 65vh; background: #fffff; border: 1px solid #E6E6E6; border-radius:3px; padding:10px;  margin-top: 10px;"></canvas>

            <script>
              var ctx = document.getElementById("chart1").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['Day1','Day2','Day3','Day4','Day5','Day6','Day7','Day8','Day9','Day10','Day11','Day12','Day13','Day14'],
                      datasets: 
                      [

                      {
                        label: 'Heart Rate',
                          data: [<?php echo $heartrate; ?>],
                          backgroundColor: 'rgba(0,255,255,0.1)',
                          borderColor:'rgba(0,0,255)',
                          borderWidth: 3	
                      }]
                  },
              
                  options: {
                      scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 100}]}},
                      tooltips:{mode: 'index'},
                      legend:{display: false, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
                  }
              });
            </script>
	    </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-6" style="padding: 10px;">
      <div class="card" id="card4">
        <div class="card-body" style="margin: 0px; padding: 3%;">
          <div class="container">	
            <h4>Oxygen</h4>       
            <canvas id="chart2" style="width: 100%; height: 65vh; background: #fffff; border: 1px solid #E6E6E6; border-radius:3px; padding:10px; margin-top: 10px;"></canvas>

            <script>
              var ctx = document.getElementById("chart2").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['Day1','Day2','Day3','Day4','Day5','Day6','Day7','Day8','Day9','Day10','Day11','Day12','Day13','Day14'],
                      datasets: 
                      [

                      {
                        label: 'Oxygen',
                          data: [<?php echo $oxygen; ?>],
                          backgroundColor: 'rgba(255,255,0,0.1)',
                          borderColor:'rgba(255,255,0)',
                          borderWidth: 3	
                      }]
                  },
              
                  options: {
                      scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 100}]}},
                      tooltips:{mode: 'index'},
                      legend:{display: false, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
                  }
              });
            </script>
	    </div>
        </div>
      </div>
    </div></div>
    
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6" style="padding: 10px;">
      <div  class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col-xl-12" >
      <div class="card mb-3">
        <div class="row g-0">
          <div  style="text-align: center;" class="col-md-2">
            <svg xmlns="http://www.w3.org/2000/svg"   width="80px" height="150px"  fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
          </div>
          <div class="col-md-10">
            <div class="card-body">
              <h5 class="card-title">Prevention for caretakers</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a style="margin-bottom: 20px;" href="index.html#prevention" class="btn btn-primary float-right">Read more</a>
            </div>
          </div>
        </div>
      </div></div></div>
      <div  class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col-xl-12" >
      <div class="card mb-3">
        <div class="row g-0">
          <div style="text-align: center;" class="col-md-2">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="100px" height="150px" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>          </div>
          <div class="col-md-10">
            <div class="card-body">
              <h5 class="card-title">Home Quarantine Guidelines</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a style="margin-bottom: 20px;" href="index.html#homeq" class="btn btn-primary float-right">Read more</a>
            </div>
          </div>
        </div>
      </div></div>
    </div>
  </div>
  </div></div>
</section>
<script src="src/js/jquery-3.2.1.min.js"></script>
<script src="src/js/popper.min.js"></script>
  <script src="src/js/jquery.slimscroll.js"></script>
  <script src="src/js/Chart.bundle.js"></script>
  <script src="src/js/chart.js"></script>
  <script src="src/js/app.js"></script>

<!--contact docs-->
<div class="modal fade" id="contactDoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">How to contact a Doctor?</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 colsm-12">
            <p>For consulting a doctor, you need to follow these steps:</p>
            <ol>
              <li>Download your report</li>
              <li>Find a doctor from <a href="doctors.php">this list</a></li>
              <li>Send your report to the doctor through E-mail/WhatsApp.</li>
            </ol>
            <p>Guide for downloading report:</p>
            <img src="images/downloadreport.png" width="100%" alt="guide">
<br>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>
