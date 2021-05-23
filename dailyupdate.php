


<?php
    session_start();
    $exists=false;
    // session_start();
    // echo "Welcome, ".$_SESSION['emailaddress'];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        include 'connect.php ';
        
        $temperature = $_POST["temperature"]; 
        $oxygen = $_POST["oxygen"]; 
        $heartrate =   $_POST["heartrate"]; 
        $BreathingProblem = "";
        $SpeakingProblem = "";
        $ChestPain = "";
        $SoreThroat = "";
        $Conjunctivitis = "";
        $LossOfTasteAndSmell = "";
        $DiscolourationOfFingers = "";
        $Fever = "";
        $DryCough = "";
        $Tiredness = "";



      if (isset($_POST['breathingproblem']) && ($_POST['breathingproblem'] == "Yes")) {
        $BreathingProblem = "Yes";
        } else {
        $BreathingProblem = "No";
        }

        if (isset($_POST['speakingproblem']) && ($_POST['speakingproblem'] == "Yes")) {
          $SpeakingProblem = "Yes";
          } else {
          $SpeakingProblem = "No";
          }

        if (isset($_POST['chestpain']) && ($_POST['chestpain'] == "Yes")) {
          $ChestPain = "Yes";
          } else {
          $ChestPain = "No";
          }
        
          
        if (isset($_POST['sorethroat']) && ($_POST['sorethroat'] == "Yes")) {
          $SoreThroat = "Yes";
          } else {
          $SoreThroat = "No";
          }
        
        if (isset($_POST['lossoftasteandsmell']) && ($_POST['lossoftasteandsmell'] == "Yes")) {
          $LossOfTasteAndSmell = "Yes";
          } else {
          $LossOfTasteAndSmell = "No";
          }

        if (isset($_POST['conjunctivitis']) && ($_POST['conjunctivitis'] == "Yes")) {
          $Conjunctivitis = "Yes";
          } else {
          $Conjunctivitis = "No";
          }
      
        if (isset($_POST['discolourationoffingers']) && ($_POST['discolourationoffingers'] == "Yes")) {
          $DiscolourationOfFingers = "Yes";
          } else {
          $DiscolourationOfFingers = "No";
          }

        if (isset($_POST['fever']) && ($_POST['fever'] == "Yes")) {
          $Fever = "Yes";
          } else {
          $Fever = "No";
          }


          
        if (isset($_POST['drycough']) && ($_POST['drycough'] == "Yes")) {
          $DryCough = "Yes";
          } else {
          $DryCough = "No";
          }
        
        if (isset($_POST['tiredness']) && ($_POST['tiredness'] == "Yes")) {
          $Tiredness = "Yes";
          } else {
          $Tiredness = "No";
          }
        
                
     
        // if($temperature) {
           
            
        
        //     echo "<script>
        //     alert('Reached here');
        //     window.location.href='./p_dashboard.php';
        // </script>";

            
            // $sql1 = "SELECT COUNT(*) FROM `dailyupdate`
            //                   WHERE EXISTS(SELECT * FROM `dailyupdate` 
            //                   WHERE id = 20 AND date = '2021-05-22' )";
            


            $id = ($_SESSION['id']) ;
            // echo "Welcome, ". $_SESSION['emailaddress']
            // echo $rows;

            
            



            $sql1 = "SELECT * FROM `dailyupdate` 
                              WHERE id = $id AND date = CURDATE() ";
             
            $result=mysqli_query($conn,$sql1);
            $no_of_rows = mysqli_num_rows($result);
            //  $rows = mysqli_num_rows($sql1);
             echo "<script>
                    alert('Updated Successfully');
                    window.location.href='./p_dashboard.php';
                </script>";
            //new user
            if($no_of_rows==0) 
            {
                //passord matches
                if($exists==false) {
            
                     


                //     echo "<script>
                //     alert('exist is false here');
                //     window.location.href='./p_dashboard.php';
                // </script>";
                //     echo "      ";
                    
                    $id = ($_SESSION['id']) ;
                    // echo $id;
                    // INSERT INTO `dailyupdate` (`id`, `temperature`, `oxygen`, `heartrate`, `BreathingProblem`, `SpeakingProblem`, `ChestPain`, `SoreThroat`, `LossOfTasteAndSmell`, `Conjunctivitis`, `DiscolourationOfFingers`, `Fever`, `DryCough`, `Tiredness`, `date`) VALUES ('17', '95', '100', '85', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'No', 'current_timestamp()');

                    // if($no_of_rows==0) { heree

                    $sql = "INSERT INTO `dailyupdate` ( `id`,`temperature`, `oxygen`, `heartrate`, `BreathingProblem`, `SpeakingProblem`, `ChestPain`, `SoreThroat`, `LossOfTasteAndSmell`, `Conjunctivitis`, `DiscolourationOfFingers`, `Fever`, `DryCough`, `Tiredness`, `date`) 
                    VALUES ('$id', '$temperature' ,'$oxygen','$heartrate','$BreathingProblem','$SpeakingProblem','$ChestPain', '$SoreThroat', '$LossOfTasteAndSmell','$Conjunctivitis','$DiscolourationOfFingers','$Fever','$DryCough','$Tiredness', current_timestamp());";
                    // echo $sql;
                    $result=mysqli_query($conn,$sql);
                    
                    if(!$result){
                          die("QUERY FAILED.".mysqli_error($conn));
                      }
                    
                    
                    if ($result) {
                      // echo "Successfully added!";
                      echo "<script>
                          alert('Your health data have been sucessfully uploaded');
                          window.location.href='./p_dashboard.php';
                      </script>";
                        }
                    } //end if password
                    else { 
                        // echo "Not added";
                        echo "<script>
                            alert('Sorry, your data have not been uploaded! Please try again');
                            window.location.href='./register.php';
                        </script>"; 
                    }
                  
                    $conn->close();
                    // $resultAll = mysqli_query($conn, $sql);
                    // if(!$resultAll){
                    //     die(mysqli_error($conn));
                    // }

                    // if (mysqli_num_rows($resultAll) > 0) {
                    //     while($rowData = mysqli_fetch_array($resultAll)){
                    //         echo $rowData["id"].'<br>';
                    //     }
                    // }
                    
                    // $result = mysqli_query($conn, $sql);
                    // $result = mysqli_fetch_assoc($result);
                    // if(!$result){
                    //     echo "<script>
                    //     alert('error in gender  $gender');

                    //     window.location.href='./register.php';
                    // </script>";
                    // }
            
                          
            }// end if num==0                         
            else{
              $id = ($_SESSION['id']) ;
              $sql2 = "UPDATE `dailyupdate` SET temperature = $temperature, oxygen = $oxygen, heartrate = $heartrate, BreathingProblem ='$BreathingProblem', SpeakingProblem = '$SpeakingProblem', ChestPain = '$ChestPain', SoreThroat = '$SoreThroat', LossOfTasteAndSmell = '$LossOfTasteAndSmell', Conjunctivitis = '$Conjunctivitis', DiscolourationOfFingers = '$DiscolourationOfFingers', Fever = '$Fever', DryCough = '$DryCough', Tiredness = '$Tiredness' WHERE id = '$id' AND date = '2021-05-22' ";
              // echo $sql;
              $result=mysqli_query($conn,$sql2);
              
              if(!$result){
                    die("QUERY FAILED.".mysqli_error($conn));
                }

            }
            
            //user with same emailid already exists
            // if($num>0) 
            // {
                
            //     echo "<script>
            //         alert('User with same emailid already exists');
            //         window.location.href='./register.php';
            //     </script>"; 
            // } 
            
        // }//end of if temp
    }//end if
    ?>






<!--end of daily tracker modal-->

