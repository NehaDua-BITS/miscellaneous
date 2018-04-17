<?php

function callPostApi($url, $data){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);   // post data
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	print_r("\nApi response : ".$response."\n");
	curl_close ($ch);
}

//Connect To Database : change fields to your requirements
$hostname='localhost';
$username='username';
$password='password';
$dbname='db';
$usertable='table';
$yourfield = 'field';

// create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "\nConnected successfully\n\n";

$url = "<api-url>";
$sql = 'SELECT * FROM ' . $usertable;
$result = $conn->query($sql);
if($result) {
    while($row = $result->fetch_assoc()){
	    echo $row[$yourfield] . "\n";
	    callPostApi($url, $row[$yourfield]);
    }
}
else {
	print "0 results";
}

?>
