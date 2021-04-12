<?php
$token = "BQB601rowJOG2_k8_Doelef1C4y1Wgehmn-7wVtYkxgYz1AbGmR18xsyuz_wU-6G3tDwlax_zmIYaZKtDqWFikzJfEkePaSmjq_iD_g9YI51D3eV84VLEL7lv0fpuaS5lSIrKkXcGHQ";
//setup the request, you can also use CURLOPT_URL
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
        echo $item['artists'][0]['name'];
        $bool = False;
}
?>

<script type="text/javascript">
// boolean outputs "" if false, "1" if true
var bool = <?= json_encode($bool); ?>
var myString: string = String(bool);
alert(myString);
</script>

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
<style type="text/css">
	html, body
	{
	  margin: auto;
	  padding: 300px 0 0;
	  font-family: Arial, Times;
	  font-size: 300px;
	  color: black;
	  font-weight: 550;
	  overflow:hidden;
	}
	input
	{
		padding: 5px;
		border-radius: 10px;
		border-style: solid;
		border-color: blue;
		transition-duration: 0.5s;
		width: 80%;
	}
	input:focus
	{
		border-color: skyblue;
		transition-duration: 0.5s;
	}
</style>
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
	<?php
		if (isset($_POST['tiktok-url']) && !empty($_POST['tiktok-url'])) {
			$url = trim($_POST['tiktok-url']);
			$resp = getContent($url);
			//echo "$resp";
			$check = explode('"downloadAddr":"', $resp);
			if (count($check) > 1){
				$contentURL = explode("\"",$check[1])[0];
                $contentURL = str_replace("\\u0026", "&", $contentURL);
				$thumb = explode("\"",explode('og:image" content="', $resp)[1])[0];
				$username = explode('/',explode('"$pageUrl":"/@', $resp)[1])[0];
				$create_time = explode(',', explode('"createTime":', $resp)[1])[0];
				$dt = new DateTime("@$create_time");
				$create_time = $dt->format("d M Y H:i:s A");
				$videoKey = getKey($contentURL);
				$cleanVideo = "https://api2-16-h2.musical.ly/aweme/v1/play/?video_id=$videoKey&vr_type=0&is_play_url=1&source=PackSourceEnum_PUBLISH&media_type=4";
				$cleanVideo = getContent($cleanVideo, true);
				if (!file_exists("user_videos") && $store_locally){
					mkdir("user_videos");
				}
				if ($store_locally){
					?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#wmarked_link').text("Please wait ...");
                            $.get('./<?php echo basename($_SERVER['PHP_SELF']); ?>?url=<?php echo urlencode($contentURL); ?>').done(function(data)
                                {
                                    $('#wmarked_link').removeAttr('disabled');
                                    $('#wmarked_link').attr('onclick', 'window.location.href="' + data + '"');
                                    $('#wmarked_link').text("Download Video");
                                });
                        });
                    </script>
                    <?php
				}
		?>
		<script>
		    $(document).ready(function(){
		        $('html, body').animate({
					    scrollTop: ($('#result').offset().top)
					},1000);
		    });
		</script>
	<div class="border m-3 mb-5" id="result">
	    <div class="text-center"><br>Bot/Scraper Development Services: <a target="_blank" href="https://www.we-can-solve.com">We-Can-Solve.com</a></div>
		<div class="row m-0 p-2">
		<div class = video>	
		<video controls="" autoplay="" name="media">
    <source src= data type="video/mp4">
			</video></div>
			<div class="col-sm-5 col-md-5 col-lg-5 text-center"><img width="250px" height="250px" src="<?php echo $thumb; ?>"></div>
			<div class="col-sm-6 col-md-6 col-lg-6 text-center mt-5"><ul style="list-style: none;padding: 0px">
				<li>a video by <b>@<?php echo $username; ?></b></li>
				<li>uploaded on <b><?php echo $create_time; ?></b></li>
				<li><button id="wmarked_link" disabled="disabled" class="btn btn-primary mt-3" onclick="window.location.href='<?php if ($store_locally){ echo $filename;} else { echo $contentURL; } ?>'">Download Video</button> <button class="btn btn-info mt-3" onclick="window.location.href='<?php echo $cleanVideo; ?>'">Download Watermark Free!</button></li>
				<li><div class="alert alert-primary mb-0 mt-3">If the video opens directly, try saving it by pressing CTRL+S or on phone, save from three dots in the bottom left corner</div></li>
			</ul></div>
		</div>
	</div>
	<?php
			}
			else
			{
				?>
				<script>
        		    $(document).ready(function(){
        		        $('html, body').animate({
        					    scrollTop: ($('#result').offset().top)
        					},1000);
        		    });
        		</script>
				<div class="mx-5 px-5 my-3" id="result">
				    <div class="text-center"><br>Bot/Scraper Development Services: <a target="_blank" href="https://www.we-can-solve.com">We-Can-Solve.com</a></div>
					<div class="alert alert-danger mb-0"><b>Please double check your url and try again.</b></div>
				</div>

				<?php
			}
		}
	?>
	<div class="m-5">
		&nbsp;
	</div>
    <script type="text/javascript">
        window.setInterval(function(){
            if ($("input[name='tiktok-url']").attr("placeholder") == "https://www.tiktok.com/@username/video/1234567890123456789") {
                $("input[name='tiktok-url']").attr("placeholder", "https://vm.tiktok.com/a1b2c3/");
            }
            else
            {
                $("input[name='tiktok-url']").attr("placeholder", "https://www.tiktok.com/@username/video/1234567890123456789");
            }
        }, 3000);
    </script>
</body>
</html>
