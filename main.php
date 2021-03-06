<?php if (!defined("CONFIG"))
    exit();

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$exe_blocks = mysqli_query($link,"SELECT `id`, `title`, `content_file`, `content_html`, `language`, `sort_order` FROM blocks WHERE `active` = 1 ORDER BY `sort_order` ASC");
if ($exe_blocks) {
	while (list($blockID, $blockTitle, $blockContentFile, $blockContentHtml, $blockSortOrder) = mysqli_fetch_array($exe_blocks)) {
		if (!$blockTitle)
			continue;

		if ($blockContentFile) {

			if (strpos($blockContentFile, '/') !== false)
				continue;

			if (file_exists('blocks/'.$blockContentFile.'.php')) {
				ob_start();
				include("blocks/$blockContentFile.php");
				$blockContent = ob_get_clean();
			} else {
				$blockContent = "<p align='center'>File <strong>$blockContentFile</strong> has not been found</p>";
			}

		} elseif ($blockContentHtml) {
			$blockContent = $blockContentHtml;
		} else
			$blockContent = "<p align='center'>Content has not been found</p>";

		$blocks[] = array(
			"id" => $blockID,
			"title" => $blockTitle,
			"content" => $blockContent
		);
	}
	mysqli_free_result($exe_blocks);
} else
	$blocks = array();

# News
$exe_news = mysqli_query($link,"SELECT `id`, `title`, `news`, `day` FROM main_news ORDER BY day DESC LIMIT 5");

?>


<!-- Automatic Slideshow Images -->
<div class=" w3-black" align="center">
  <div class="mySlides w3-display-container">
    <img src="images/2011_FIA_GT1_Silverstone_2.jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>FIA GT1 at Silverstone in 2011</h3>
      <p><b>By ToNG!? - FIA GT1, CC BY 2.0, https://commons.wikimedia.org/w/index.php?curid=20368769</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container">
    <img src="images/Formel3_racing_car_amk.jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>Formula three racing car at Hockenheimring.</h3>
      <p><b>By user:AngMoKio - selfmade photo at Hockenheim 2008, CC BY-SA 2.5, https://commons.wikimedia.org/w/index.php?curid=3883701</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container">
    <img src="images/2012_WTCC_Race_of_Japan_(Race_1)_opening_lap.jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>World Touring Car Championship 2012 Race of Japan</h3>
      <p><b>By Morio - Own work, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=22398475</b></p>
    </div>
  </div>
   <div class="mySlides w3-display-container">
    <img src="images/In_Car_Micheal_Fitzgerald_Cork_Racing.jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>In Car Footage from a Van Diemen RF01 driven by Micheal Fitzgerald Cork Racing</h3>
      <p><b>By Glen Duncombe - http://www.flickr.com/photos/corkracing/5412216243/, CC BY 2.0</b></p>
    </div>
  </div>
    <div class="mySlides w3-display-container">
    <img src="images/Audi_R18_e-tron_quattro_at_2013_Le_Mans.jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>Audi R18 e-tron quattro at 2013 Le Mans</h3>
      <p><b>By kevinmcgill from Den Bosch, Netherlands - KAM_5118, CC BY-SA 2.0, https://commons.wikimedia.org/w/index.php?curid=31689732</b></p>
    </div>
  </div>
    <div class="mySlides w3-display-container">
    <img src="images/Green_flag_at_Daytona.JPG" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>The green flag flies on a new season of NASCAR. 2015</h3>
      <p><b>By Nascarking - Own work, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=38582044</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/Andreas_Mikkelsen_-_WRC_Portugal_2013_(8647047945).jpg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>Andreas_Mikkelsen_-_WRC_Portugal_2013</h3>
      <p><b>By Tiago J. G. Fernandes from Portimão, Portugal - Andreas Mikkelsen - WRC Portugal 2013, CC BY 2.0, https://commons.wikimedia.org/w/index.php?curid=26871873</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-60881.jpeg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>pexels-photo-60881</h3>
      <p><b>pexels-photo-60881</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-158971.jpeg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>pexels-photo-158971</h3>
      <p><b>pexels-photo-158971</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-12789.jpeg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>pexels-photo-12789</h3>
      <p><b>pexels-photo-12789</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-169176.jpeg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>pexels-photo-169176</h3>
      <p><b>pexels-photo-169176</b></p>
    </div>
   </div>
    <div class="mySlides w3-display-container">
    <img src="images/car-race-ferrari-racing-car-pirelli-50704.jpeg" style="height:500px">
    <div class="w3-display-bottommiddle w3-text-white w3-padding-32 w3-hide-small">
      <h3>car-race-ferrari-racing-car-pirelli-50704</h3>
      <p><b>car-race-ferrari-racing-car-pirelli-50704</b></p>
    </div>
  </div>
</div>

<script>
// Automatic Slideshow - change image every 8 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 8000);
}

</script>

<!-- Main page content-->

<!--Side Bar-->
<div class="w3-row">
<?php
if ($blocks) {
	?>

	<div class="w3-col s12 l3 w3-gray w3-border w3-border-black w3-round-xlarge">
		<?php
		foreach($blocks as $blockTempID => $blockDetails) {
			?>
			<div>

				<div class="w3-center w3-black w3-text-white"><h2><?=$blockDetails['title'];?></h2></div>
				<div class="w3-responsive w3-padding-tiny">
					<?=$blockDetails['content'];?>
				</div>

			</div>
			<?php
		}
		?>
	</div>

	<?php
}
?>


<!--NEWS-->
<div class="w3-col s12 l9 w3-dark-gray w3-border w3-border-black w3-round-large w3-center">
<div class="w3-center w3-black w3-text-white"><h2>News</h2></div>
<?php
if ($exe_news) {
	?>

	<?php
	while (list($id, $title, $news, $day) = mysqli_fetch_array($exe_news)) {
		?>

			<div class="w3-center w3-black w3-text-white"><h3><?=$title;?>&nbsp;<?=$day;?></h3></div>

			<p><div class="w3-padding-large"><?=$news;?></div> </p>

		<?php
	}
	mysqli_free_result($exe_news);
}

?>
</div>
</div>
