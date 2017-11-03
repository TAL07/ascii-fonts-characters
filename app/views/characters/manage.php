<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
	Characters <small class="glyphicon glyphicon-pencil"></small>
</h1>
<hr />



<?php include __DIR__ . "./../ui/results.php"; ?> 

<hr />

<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<section class="container-fluid col-xs-10 col-xs-offset-1">
	<div class="form-group">
		<?php if (isset($model->results)): ?>
		<?php foreach($model->results as $object):?>
		
		<a class="btn btn-info" 
		   style="margin-bottom: 1em;"
		   href="./admin/characters/<?= $object->characters_value ?>?action=characters">
		   	<?= $object->characters_value ?>
		</a>
		
	<?php endforeach; ?>
	<?php endif; ?>
		</div>
		</section>
<section class="container-fluid col-xs-10 col-xs-offset-1">
	
	<form action="" method="post">
		<div class="form-group col-xs-5 col-xs-offset-1">
			
			<input name="characters_name"
				class="form-control" placeholder="Lettre majuscule A">
		</div>
		<div class="form-group col-xs-3">
			 
			<input name="characters_value"
				 class="form-control" placeholder="C">
		</div>
		
		<?php if($_SESSION["user"]["level"] == "superadmin") : ?>
		<div class="form-group col-xs-1">
		<button type="submit" class="btn btn-success glyphicon glyphicon-plus"></button>
		</div>
		<?php endif; ?>

	</form>
	

</section>
<section class="container-fluid col-xs-10 col-xs-offset-1">
			<?php if (isset($model->results)): ?>
			<?php foreach($model->results as $object):?>
			
		<div class="form-group col-xs-5 col-xs-offset-1">
			<input name="characters_name" disabled class="form-control" value="<?=htmlentities(
				$object->characters_name, ENT_QUOTES, "UTF-8")?>">
		</div>
		
		<div class="form-group col-xs-3">
			<input name="characters_value" disabled class="form-control" value="<?=htmlentities(
				$object->characters_value, ENT_QUOTES, "UTF-8")?>">
		</div>
		
		<?php if($_SESSION["user"]["level"] == "superadmin") : ?>
		<div class="form-group col-xs-1">
		<a href="./admin/characters?action=manage&character=<?=urlencode($object->characters_value)?>"
		    class="btn btn-danger glyphicon glyphicon-remove"></a>
		
		</div>
		<?php endif; ?>
			<?php endforeach; ?>
			<?php endif; ?>
			
			
			
</section>





<?php include __DIR__ . "./../footer.php"; ?>

