<?php 
  $db = mysqli_connect("35.247.133.156", "ths", "Ths@1234", "serversql","3306");
  $firstname = "";
  $lastname = "";
  $idcard = "";
  $room = "";
  $line_id = "";
  if (isset($_POST['register'])) {
  	$firstname = $_POST['fname'];
  	$lastname = $_POST['lname'];
  	$idcard = $_POST['idcard'];
	$room = $_POST['room'];
	$line_id = $_POST['line_id'];


  	$sql_u = "SELECT * FROM local_regis WHERE idcard='$idcard'";
  	$sql_e = "SELECT * FROM local_regis WHERE room='$room'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $idcard_error = "Sorry... ID CARD NO. already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $room_error = "Sorry... Room already taken"; 	
  	}else{
           $query = "INSERT INTO local_regis (firstname, lastname, idcard,room,user_ID) 
      	    	  VALUES ('$firstname', '$lastname', '$idcard', '$room','$line_id')";
           $results = mysqli_query($db, $query);
           //echo 'Saved!';
		   header( "refresh: 1; url=/register.php" );
           exit();
  	}
  }
?>