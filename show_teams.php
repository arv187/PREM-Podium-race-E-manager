<? if (!defined("CONFIG"))    exit(); ?>

<?

$teams = "SELECT `team`.`name` , `team`.`logo` FROM team ORDER BY `team`.`name` ASC LIMIT 0 , 30";
$result = mysql_query($teams);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Teams</h1>
<h2>Teams</h2>
<table border="0" width="100%" cellspacing="0" cellpadding="1">
<tr class="head">
<td><h1><strong>Name</strong></h1></td>
<td><h1><strong>Drivers</strong></h1></td>
<td><h1><strong>Logo</strong></h1></td>
</tr>
<?
$style = "odd";
while ($sitem = mysql_fetch_array($result)) {
 if ($sitem['logo'] == '') { $url = 'images/logo.png' ; } else { $url = $sitem['logo']; } 
?>
<tr class="<?= $style ?>">
<td><?= $sitem['name'] ?></td><!--team name-->
<td><?= $sitem['name'] ?></td><!--driver name-->
<td><a><img src="<?=$url;?>" width="150" height="150"/></a></td><!--url logo-->
</tr>
<?
    $style = $style == "odd" ? "even" : "odd";
}
?>
</table>