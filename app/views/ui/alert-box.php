

<?php if (isset($model->success) || isset($model->error)): ?>



<section class="alert alert-<?= isset($model->success) ? "success": "danger" ?> container-fluid col-xs-10 col-xs-offset-1">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>
  		<?= isset($model->success) ? $model->success : $model->error ?>
  </strong> 
</section>

<?php endif; ?>