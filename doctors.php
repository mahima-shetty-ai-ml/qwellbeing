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

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Q-Wellbeing | Doctors list</title>

  <!--Jquery, CSS, JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
  rel="stylesheet" 
  integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" 
  crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" 
  crossorigin="anonymous"></script>
  <style>
      td {
          padding: 90px;
      }
  </style>	

</head>
<body>

<!--Navbar-->
<header id="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="./index.html">
              
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
              <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<!--end of Navbar-->
<!--Doctors table-->
<section style="margin: 50px;">
  <div class="row">
    <h1>Doctors in Q-Wellbeing</h1>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="padding: 20px;" scope="col">Doctor name</th>
            <th style="padding: 20px;"  scope="col">Specialization</th>
            <th style="padding: 20px;"  scope="col">E-mail</th>
            <th style="padding: 20px;"  scope="col">WhatsApp</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th style="padding: 20px;"  scope="row">Dr. Avinash Chaudhary</th>
            <td style="padding: 20px;" >Cardiologist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=avinash@gmail.com">avinash@gmail.com</a></td>
            <td style="padding: 20px;" >8888899999</td>
          </tr>
          <!-- <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=nss.dmce@gmail.com" -->
          <tr>
            <th  style="padding: 20px;" scope="row">Dr. Nikhil Chaudhary</th>
            <td style="padding: 20px;" >Covid specialist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=nikhil@gmail.com">nikhil@gmail.com</a></td>
            <td style="padding: 20px;" >9999977777</td>
          </tr>
          <tr>
            <th style="padding: 20px;"  scope="row">Dr. Rakesh Patil</th>
            <td style="padding: 20px;" >Pulmonologist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=rakesh@gmail.com">rakesh@gmail.com</a></td>
            <td style="padding: 20px;" >9988889999</td>
          </tr>
          <tr>
            <th  style="padding: 20px;" scope="row">Dr. Seema Ghule</th>
            <td style="padding: 20px;" >Covid specialist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=seema@gmail.com">seema@gmail.com</a></td>
            <td style="padding: 20px;" >9898989898</td>
          </tr>
          <tr>
            <th  style="padding: 20px;" scope="row">Dr. John Doe</th>
            <td style="padding: 20px;" >Covid specialist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=john@gmail.com">john@gmail.com</a></td>
            <td style="padding: 20px;" >8099980999</td>
          </tr>
          <tr>
            <th  style="padding: 20px;" scope="row">Dr. Drake Ramoray</th>
            <td style="padding: 20px;" >Covid specialist</td>
            <td style="padding: 20px;" ><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=drake@gmail.com">drake@gmail.com</a></td>
            <td style="padding: 20px;" >9999988888</td>
          </tr>
          
        </tbody>
      </table>
    </div>
    </div>
</body>
</html>
