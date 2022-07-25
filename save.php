<?php
include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
        $create_datetime = date("Y-m-d H:i:s");
		$admin=0;
		$course=$_POST['coursename'];
		$mark=$_POST['mark'];

		
		$sql = "INSERT INTO `users`( `username`, `email`,`password`,`create_datetime`,`admin`,`coursename`,`mark`) 
		VALUES ('$username','$email','$password','$create_datetime','$admin','$course','$mark')";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$course=$_POST['coursename'];
		$mark=$_POST['mark'];
		$admin=$_POST['admin'];

		
		$sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`coursename`='$course',`mark`='$mark',`admin`=$admin  WHERE id=$id";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `users` WHERE id=$id ";
		if (mysqli_query($con, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM users WHERE id in ($id)";
		if (mysqli_query($con, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}

?>