<html>
	
<?php foreach($query->result() as $row): ?>
	
	<h3><?php echo $row->title; ?></h3>
	
<?php endforeach ?>

</html>