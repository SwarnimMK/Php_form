<!-------------------- PHP ---------------------->

<?php
$insert=false;
if (isset($_POST['name'])){

    //Set connection variables
    $server = "localhost";
    $username = "root"; //username is always root for localhost
    $password = ""; //blank for localhost 
    $database = "Travel_form"; //optional - no need to specify

    //Create a database connection
    $con = mysqli_connect($server, $username, $password, $database); //$con = variable for connection and mysqli_connect = function

    if(!$con){
        die("connection to this database failed due to " . mysqli_connect_error() );
    }
    //echo "Success connecting to db";

    $name = $_POST['name']; //$_POST & $_GET used to read submitted data by HTML form
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql =  "INSERT INTO `Travel_form`.`travel`(`Name`, `Age`, `Gender`, `Email`, `Phone no.`, `Other`, `DT`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if ($con->query($sql) == true){
        //echo "Successfully Inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!-------------------- HTML --------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Travel Form</title>
</head>
<body>
    <img class="background" src="/bg1.gif">
    <div class="container">
        <h1>Welcome to Swarnim's Manali Travel Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank You! Your response has been recorded </p>";
        }
        ?>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter  Your  Name" required>

            <input type="text" name="age" id="age" placeholder="Enter  Your  Age" required>

            <input type="text" name="gender" id="gender" placeholder="Enter  Your  Gender" required>
           
            <input type="email" name="email" id="email" placeholder="Enter  Your  Email" required>
            
            <input type="phone" name="phone" id="phone" placeholder="Enter  Your  Phone no" required>
            
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder=" Enter Any Other Information Here" required>  </textarea>

            <button class="btn">SUBMIT</button>
            
        </form>
    </div>
    <script src="index.js"> </script>
</body>
</html>

 
