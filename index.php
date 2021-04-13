<script type="text/javascript">
function printStatus(status){
	console.log(status);
}
</script>

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

<!DOCTYPE html>
<html>
<head>
	<title>Did Kanye Drop Yandhi Yet?</title>
	<link rel="icon" href="kanyefav.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">
</head>
<style>
body {
  text-align: center;
  background-image: url('kanye-west-yandhi-hologram-01.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
</style>
<body class="bg-light">
	<div class="text-center p-5">
		<h1 class="mt-5">NO</h1>		
	</div>
</body>
</html>
