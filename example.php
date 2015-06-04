<?php
include("class.YoutubeVideoDetails.php");

// Video
$youtube = new YoutubeVideoDetails;
$youtube->video("UODCeqpVEEE");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Youtube Video Details Class Example</title>
	<style type="text/css">
	body{ background-color: #FBFBFB; font-family: Arial; font-size: 12px; color: #333; line-height: 20px; }
	.box { background-color: #fff; border: 1px solid #e2e2e2; width: 730px; padding: 10px; margin: 0px auto;}
	</style>
</head>
<body>

<div class="box">
<h1><?php echo $youtube->get_title(); ?></h1>
<?php echo $youtube->get_embed('100%',500); ?>
<table width="700">
	<tr>
		<td width="150"><strong>Title</strong></td>
		<td><?php echo $youtube->get_title(); ?></td>
	</tr>
	<tr>
		<td><strong>Author</strong></td>
		<td><?php echo $youtube->get_author(); ?></td>
	</tr>
	<tr>
		<td><strong>Description</strong></td>
		<td><?php echo $youtube->get_description(); ?></td>
	</tr>
	<tr>
		<td><strong>Duration (In seconds)</strong></td>
		<td><?php echo $youtube->get_duration(); ?></td>
	</tr>
	<tr>
		<td><strong>Views</strong></td>
		<td><?php echo $youtube->get_views(); ?></td>
	</tr>
	<tr>
		<td><strong>Rating</strong></td>
		<td><?php echo $youtube->get_rating(); ?></td>
	</tr>
	<tr>
		<td><strong>Amount raters</strong></td>
		<td><?php echo $youtube->get_amount_raters(); ?></td>
	</tr>
	<tr>
		<td><strong>Publish date</strong></td>
		<td><?php echo $youtube->get_publish_date(); ?></td>
	</tr>
	<tr>
		<td><strong>Category</strong></td>
		<td><?php echo $youtube->get_category(); ?></td>
	</tr>
	<tr>
		<td><strong>Link</strong></td>
		<td><?php echo $youtube->get_link(); ?></td>
	</tr>
	<tr>
		<td><strong>Thumb</strong></td>
		<td><img src="<?php echo $youtube->get_thumbnail(); ?>" /></td>
	</tr>
</table>
</body>
</html>
