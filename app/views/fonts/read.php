<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
Fonts <small class="glyphicon glyphicon-book"></small>
</h1>
<hr />


<?php include __DIR__ . "./../ui/results.php"; ?> 



<section class="container-fluid col-xs-10 col-xs-offset-1">

		<div class="form-group">
		<?php if (isset($model->results)): ?>
		<?php foreach($model->results as $object):?>
		
		<a class="btn btn-info" 
		   style="margin-bottom: 1em;"
		   href="./admin/fonts/<?=($object->fonts_name)?>?action=manage">
		   	<?= $object->fonts_name ?>
		</a>
		
	<?php endforeach; ?>
	<?php endif; ?>
			
		</div>
		
		<?php if ($_SESSION["user"]["level"] == "superadmin") : ?>
		<div class="container-fluid col-xs-10 col-xs-offset-5">
		<a href="./admin/fonts?action=create"
		type="submit" class="btn btn-primary">Create a font</a>

	
		</div>
		<?php endif; ?>
</section>




<?php include __DIR__ . "./../footer.php"; ?> 













