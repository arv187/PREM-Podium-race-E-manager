<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<h1>Delete Sim results entry</h1>

<?
$id = addslashes($_GET['id']);
$query = "SELECT * FROM sim_results WHERE id = '$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}
if(mysql_num_rows($result) == 0) {
	show_error("User does not exist\n");
	return;
}
$item = mysql_fetch_array($result);
?>

<form action="sim_results_add_do.php" method="post">
<table border="0">
<tr>
	<td>Race name:</td>
	<td><?=$item['race_name']?></td>
    <td>Season:</td>
	<td><?=$item['season']?></td>
    <td>Url:</td>
    <td><?=$item['simresults_url']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Delete">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
		<input type="hidden" name="id" value="<?=$id?>">
	</td>
</tr>
</table>
</form>