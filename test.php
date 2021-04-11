<?php 
curl -X "GET" "https://api.spotify.com/v1/search?q=Yahndi&type=album&market=US&limit=10&offset=5" -H "Accept: application/json" -H "Content-Type: application/json" -H "Authorization: Bearer BQCGwMWa8GWxNdRNpT4AjrS8tIHhDt7Zm1lAkDKssBB5DyZOP_TtXfOcPoKlXvN9sI0qqFIDQ4W_9fToMYu2DamQVboBSUXJc85AOXkfQfsphyoI3APYqC6Mkgde9j4zAv9lsKgnMxs";
echo "hey";

$albums = "Yahndi"';

$spotifyURL = 'https://api.spotify.com/v1/search?q='.urlencode($albums).'&type=album';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $spotifyURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$json = curl_exec($ch);
$json = json_decode($json);
curl_close($ch);

echo '<pre>'.print_r($json, true).'</pre>';
?>
