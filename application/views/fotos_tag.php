<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Fotos con el hashtag</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="screen"/>
</head>
<body>

<div id="container">
	<h1>Fotos con el hashtag <?php echo $tag?></h1>

	<div id="body">
<?php
if($tag==""):
	//mostrar formulari
?>

<form action="<?php echo site_url('fotos/tag')?>">
Tag: <input name="tag" type="text">
<input type="submit" value="cercar">
</form>

<?php
else:
	//mostrar les fotos

?>
<?php foreach($fotos as $foto): ?>

<a href='<?php echo $foto->link?>'>
<img src='<?php echo $foto->images->standard_resolution->url?>'>
</a>

<?php endforeach; ?>

<?php
endif;
?>
</div>
</div>

</body>
</html>
