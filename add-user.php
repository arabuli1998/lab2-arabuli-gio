<?php

$db = 'myDB';
$host = 'localhost';
$name = 'root';
$password = '';

$conn = new mysqli($host, $name , $password, $db);

if (!$conn) {
    die("კავშირი ბაზასთან ვერ დამყარდა" . $conn->connect_error);
}


session_start();

$persNumber = $_POST['personalNumber'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$reg = "";

$persNumbErr = "";
$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$passwordErr = "";

$isEmpty = 0;

function isEmptyF($val ,$err, $isEmpty, $POSTname){
    if(empty($val)){
        $err = "Empty field";
        $isEmpty = 1;
    }
    else{
        $val = trim($_POST["$POSTname"]);
        $val = htmlspecialchars($val);
    }
}

isEmptyF($persNumber,$persNumbErr,$isEmpty,'personalNumber');
isEmptyF($firstName,$firstNameErr,$isEmpty,'firstname');
isEmptyF($lastName,$lastNameErr,$isEmpty,'lastname');
isEmptyF($email,$emailErr,$isEmpty,'email');
isEmptyF($password,$passwordErr,$isEmpty,'password');

$hashedPassword = password_hash($password,PASSWORD_BCRYPT);




if($isEmpty == 0){

    $sqle = "SELECT * FROM users WHERE Email = '$email'";
    $sqlp = "SELECT * FROM users WHERE PersonalNumber = '$persNumber'";
    $vale = mysqli_query($conn,$sqle);
    $valp = mysqli_query($conn,$sqlp);

    if($res = mysqli_num_rows($vale) > 0){
        $emailErr = "ეს იმეილ მისამართი უკვე გამოყენებულია.";
    }
    if($res = mysqli_num_rows($valp) > 0){
        $persNumbErr = "ეს personal number უკვე გამოყენებულია.";
    }
}

if(empty($persNumbErr) && empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($passwordErr)){

    $sql = "INSERT INTO users (FirstName,LastName,PersonalNumber,Email,Pass)
    VALUE ('$firstName','$lastName','$persNumber','$email','$hashedPassword')";
    $res = mysqli_query($conn, $sql);
    $reg = "<p style=color:green;>  <b> <i> რეგისტრაცია წარმატებით დასრულდა </i> </b> </p>";
}else{
    $reg = "<p style=color:red;> <b> რეგისტრაცია ვერ მოხერხდა </b> </p>";
}

$conn -> close();

?>