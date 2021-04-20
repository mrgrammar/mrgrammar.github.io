<?php
$ipad = $_SERVER['REMOTE_ADDR'];
require_once("config/db9.php");

$database = "mrgrammar_ei9";
$username = "mrgrammar_ei9";
$password = "2p7vzgg6";

date_default_timezone_set("Europe/London");
$myDate0 = date('Y-m-d', strtotime('-1 day'));
$myDate = date('Y-m-d');
$wkday0=date('l', strtotime('-1 day'));
$wkday=date('l');
$wkday2=date('l', strtotime('+1 day'));
$dayvar = date('j');

//$dayvar=9;

if($_GET) {
$dayvar=$_GET['d'];
}

//$day=(int)$day-98;
//$day1=(int)$day-46;

if($day>31){
$day=(int)$day-31;
$gn=$day;
} else {
$gn=$day;
}
if($gn==0){
$gn=4;
}
$gid=(int)$gn;

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "INSERT INTO alog (`ipa`,`page`)
				VALUES ('$ipad',1)");

mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Quote Authors Slideshow</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Daily Quote Author Slideshow for Someone Said game" />
        <meta name="keywords" content="Micro-Bios, Biographies, " />
        <meta name="author" content="Ted O'Brien" />

        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/lib/js/jquery-1.7.1.min.js"><\/script>')</script>
		<script src="jplayer/jquery.jplayer.js"></script>
		<script src="js/jquery.audioslideshow.js"></script>
		<script>
			$(document).ready(function() {
				$('#audio-slideshow').audioSlideshow();
			});
		</script>
<?php
echo "

<style>

body {  margins: 0; }
</style>";


echo "

<SCRIPT TYPE='text/javascript'>


";

print "var gid = $gid;\n";
print "var wkday = '$wkday';\n";
print "var ipad = \"$ipad\";\n";

//? $auths=implode(",", $set);array_slice($set, 0);



// .toString() rn = authors.split(",");
echo '
</SCRIPT>
</head><body topmargin=0 bottommargin=0>
        <div class="container">
			<!-- Codrops top bar data-audio="01-audioA.mp3" -->
            <div class="codrops-top">
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
			<section>
			<center style="font-size: 18pt; font-weight: bold; line-height:18pt; font-family:arial,helvetica,verdana;">'.$wkday.'&apos;s Quote Authors</center>
			';



include "dailygrids/slides".$dayvar.".php";





echo '
					<div class="audio-control-interface">
						<div class="play-pause-container" style="align:center;">
							<a href="javascript:;" class="audio-play" tabindex="1" style="align: center;">Play</a>
							<a href="javascript:;" class="audio-pause" tabindex="1" style="align: center;">Pause</a>
						</div>
						<div class="timeline">
							<div class="timeline-controls"></div>
							<div class="playhead"></div>
						</div>
						<div class="dailygm">
							<a href="https://someonesaid.tv/ssdg.php" target=_parent class="dsilygm-play" tabindex="1" style="align: center;">Daily Game</a>
						</div>
						<div class="jplayer"></div>
					</div>
				</div>
			</section>
        </div>
        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Daily Game" onclick="javascript:parent.document.location.href=\'https://someonesaid.tv/ssdg.php\';"> -->
    </body>
</html>';

?>

























