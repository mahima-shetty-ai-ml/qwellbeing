<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'connect.php ';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qwellbeing - User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/profile.css">

    <style>
        label {
            font-size: 1.5rem;
        }
    </style>

</head>
<body>
    
    <div class="container mt-4 col-10">
        <div class="row">
            <h2 class="m-4 ">
                User profile
            </h2>
        </div>
        
        <form method="POST" action="profile.php" enctype="multipart/form-data">

            <div class="col-md-12 text-right"><button type="submit" value="submit" name="submit" id = "updatess" class=" btn btn-danger   mb-4 ">Save</button></div>

            <div class="form-group col-md-4">
                <label for="contact-no">contact number</label>
                <input type="tel" maxlength="10" class="form-control mt-2 mb-2" name="contact-no" placeholder="Enter  your contact number " required>
            </div>

            <div class="form-group col-md-4">
                <label for="address">Locality</label>
                <!-- <input type="text" maxlength="10" class="form-control mt-2 mb-2" name="contact-no" placeholder="Enter  your contact number " required> -->
                
    
                <textarea class="form-control" id="address" rows="3"></textarea>
  
            </div>
            
                
            
            <!-- <div class="row"> -->
                <label class="form-group col-md-6" for="exampleFormControlSelect2">Example multiple select</label>
                <select class="form-group col-md-6" multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            <!-- </div> -->






            


        </form>                                                                                         
    </div>                                                              
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                                    
    
</body>
</html>