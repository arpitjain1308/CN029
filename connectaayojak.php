<?php
    $name = $_POST['name'];
    $location = $_POST['location'];
    $estyear = $_POST['estyear'];
    $weblink = $_POST['weblink'];
    $conemail = $_POST['conemail'];

    $conn = new mysqli('localhost','root','','connectaayojak');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, location, estyear, weblink, conemail) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $name, $location, $estyear, $weblink, $conemail);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>