<?php
$insert = false;
if(isset($_POST['name'])){
        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";
    
        // Create a database connection
        $con = mysqli_connect($server, $username, $password);
    
        // Check for connection success
        if(!$con){
            die("connection to this database failed due to". mysqli_connect_error());
        }
        // echo "Success connecting to the db";
    
        // Collect post variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phoneno'];
        $address = $_POST['Address'];
        $country = $_POST['country'];
        
        $sql = "INSERT INTO `rform`.`test` (`Name`, `Email`, `Phone`, `Address`, `Country`, `Date`) VALUES ('$name', '$email', '$phone', '$address', '$country', current_timestamp())";
        

        if($con->query($sql) == true){
            $insert = true;
            //echo "Successfully inserted";
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }

        $con->close();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration form</title>
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body>
    <img class="bg" src="formbg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h3>REGISTRATION FORM</h3><br><br>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>


        
    <form action="index.php" method="POST">
        
        
            <label for="Name" >Name:</label>
            <input type="text" id="Name" name="name" align="left"><br>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" align="left"><br>
        
            <label for="phoneno">Mobile no:</label>
            <input type="phone" id="phoneno" name="phoneno" align="left"><br>
        
            <label for="Address">Address:</label>
            <textarea id="Address" name="Address" cols="30" rows="4" align="left"></textarea><br><br>
            
            <label for="register_country">Select country:</label>
            <select name="country" id="register_country" style="width:220px">  
                <option value="india">india</option>  
                <option value="pakistan">pakistan</option>  
                <option value="africa">africa</option>  
                <option value="china">china</option>  
                <option value="other">other</option>  
            </select><br><br>
        
            <label><button class="btn">Submit</button></label>
            
        
        
    </div>
    <script src="index.js"></script>
    </form>
    
    
</body>
</html>