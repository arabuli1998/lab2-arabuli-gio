<?php
$reg = "";
$persNumbErr = "";
$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$passwordErr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once ('add-user.php'); 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Registration Form</title>
</head>
<body>
<div class="container align-content-center m-auto w-50 " style="padding-top: 35px;">

    <form method="POST" class="text-center pb-5 pt-5 mb-2" style="border: solid #323131 5px; border-radius: 45px;background-color: grey">
        <?php echo $reg ?>
        <label for="exampleInputUsername" class="form-label" style="font-size: 20px">Personal Number</label>
        <div class="mb-3">
            <input type="text" name="personalNumber" style="border-radius: 15px" placeholder="Personal number"
                    class="form-control w-50 m-auto" id="exampleInputUsername" aria-describedby="usernameHelp">
            <?php 
                echo "<p class='text-danger'> <b>$persNumbErr</b> </p>";
            ?>
            
        </div>
        <label for="exampleInputUsername" class="form-label" style="font-size: 20px">Firstname</label>
        <div class="mb-3">
            <input type="text" name="firstname" style="border-radius: 15px" placeholder="Firstname"
            class="form-control w-50 m-auto" id="exampleInputUsername" aria-describedby="firstnameHelp">
            <?php 
                echo "<p class='text-danger'> <b>$firstNameErr</b> </p>";
            ?>
        </div>
        <label for="exampleInputUsername" class="form-label" style="font-size: 20px">Lastname</label>
        <div class="mb-3">
            <input type="text" name="lastname" style="border-radius: 15px" placeholder="Lastname"
            class="form-control w-50 m-auto" id="exampleInputUsername" aria-describedby="lastnameHelp">
            <?php 
                echo "<p class='text-danger'> <b>$lastNameErr</b> </p>";
            ?>
        </div>
        <label for="exampleInputUsername" class="form-label" style="font-size: 20px">Email</label>
        <div class="mb-3">
            <input type="text" name="email" style="border-radius: 15px" placeholder="Email"
                    class="form-control w-50 m-auto" id="exampleInputUsername" aria-describedby="usernameHelp">
                    <?php 
                echo "<p class='text-danger'><b> $emailErr </b></p>";
            ?>
        </div>
        <label for="exampleInputPassword1" class="form-label" style="font-size: 20px">Password</label>
        <div class="mb-3">
            <input placeholder="Password" name="password" style="border-radius: 15px" type="password"
                    class="form-control w-50 m-auto" id="exampleInputPassword1">
                    <?php 
                echo "<p class='text-danger'><b> $passwordErr </b></p>";
            ?>
        </div>
        <button type="submit" class="btn btn-primary" style="border-radius: 15px">Submit</button>
    </form>
</div>
</body>
</html>