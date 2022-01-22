<?php 

	$check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['pic']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'barter';
        
        //Create connection and select DB
       // Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$pname=$_POST['pname'];
$pyears=$_POST['pyears'];
$pfeatures=$_POST['pfeatures'];
$pcondition=$_POST['pcondition'];
$pexpectation=$_POST['pexpectation'];
$phoneno=$_POST['phoneno'];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO baggage 
VALUES ('$pname','$pyears','$pfeatures','$pcondition','$pexpectation','$phoneno','$imgContent')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
else
{
	echo "insert image file";
}



?>