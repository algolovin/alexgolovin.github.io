<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    
    //Database connection
	$conn = new mysqli('gator3015.hostgator.com','algolovi_alex','Tennis101!','algolovi_master');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
	$stmt = $conn->prepare("insert into contactus
	(name,
	email,
	phone_number,
	message) 
	values(?,?,?,?)");

		$stmt->bind_param('ssis', 
		$name,
		$email,
		$phone_number,
		$message);
		
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent...";
		$stmt->close();
		$conn->close();
		
		mail("1algolovin@gmail.com","Euro-Match: Contact Us - $name,$email", $phone_number,$message);
	}
	
	 

	
?>