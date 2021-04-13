<!DOCTYPE html>
<html>
<head>
	<title>Did Kanye Drop Yandhi Yet?</title>
	<link rel="icon" href="kanyefav.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
body {
	text-align: center;
	background-image: url('kanye-west-yandhi-hologram-01.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;

}
#statusText{
	font-size: 300px;
	color: black;
	font-family: Arial, Times;
	font-weight: 600;
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%)
}
</style>
<body>
	<div id = "statusText">		
	</div>
	
	<script type="text/javascript">
function printStatus(status){
	console.log(status);
	document.getElementById("statusText").innerHTML = status;
}
</script>

</body>
</html>

<?php

$client_id = '481e703f04494aba9c6509119028669b'; 
$client_secret = 'ff9760f46f92477b8fd6d38c26f5a92d'; 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

$result=curl_exec($ch);
$arr = json_decode($result);
$token = $arr->access_token;

$ch = curl_init('https://api.spotify.com/v1/search?q=Yandhi&type=album&market=US&limit=5&offset=0');

// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token
   ));

$json = curl_exec($ch);

$json = json_decode($json, TRUE);
foreach ($json['albums']['items'] as $item) {
        if($item['artists'][0]['name'] == 'Kanye West'){
            $bool = True;
            break;
        }
        $bool = False;
}

if(!$bool){
echo "<script>printStatus('NO')</script>";
}
else{
echo "<script>printStatus('YES')</script>";
}

?>
