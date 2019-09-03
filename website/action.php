<?php
$username="root";
$password="Ashish9506@";
$servername="localhost";
$databse="registration";

$con=mysqli_connect($servername,$username,$password,$databse);
if(!$con)
{
	die("Connection failed:".mysqli_connect_error());
}


$fname_err = $lname_err = $email_err = $phone_err = $course_err ="";
$fname = $lname = $email =$phone = $course ="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if (empty($_POST["fname"])){
		$fname_err= "Name is Required";
	}
	else{
		$fname = test_input($_POST["fname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$fname)){
			$fname_err="Only Letters and white space allowedd";
		}
	}

        if (empty($_POST["lname"])){
		$lname_err= "Name is Required";
	}
	else{
		$lname = test_input($_POST["lname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$lname)){
			$lname_err="Only Letters and white space allowed";
		}
	}

	if(empty($_POST["email"])){
		$email_err="Email is Required";
	}
	else{
		$email=test_input($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$email_err="Invalid email format";
		}
	}
	if (empty($_POST["course"])){
		$course_err= "Name is Required";
	}
	else{
		$course = test_input($_POST["fname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$course)){
			$course_err="Only Letters and white space allowed";
		}
	}
	if (empty($_POST["phoneno"])){
		$phone_err= "Name is Required";
	}
	else{
		$phone = test_input($_POST["phone"]);
		if(!preg_match("/^[0-9]*$/",$phone)){
			$phone_err="Only Letters and white space allowedd";
		}
	}

}

function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

$sql="INSERT INTO registration(fname,lname,email,phoneno,course) values($fname,$lname,$email,$phone,$course)";

if(mysqli_query($con,$sql)){
	echo "New record created Successfully";
}
else
{
	echo "Error: ".$sql. "<br>".mysqli_error($con);
}
mysqli_close($con);
?>
