<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">Auth</h1>
<hr class="col-xs-10" />

<?php include __DIR__ . "./../ui/alert-box.php"; ?> 

 <?php  if (!$user): ?>

<form action="" method="post"
        class="col-xs-8 col-xs-offset-2">  
    <div>
         <input name="user_mail" placeholder="Mail" class="form-control" />
    </div><br>
    <div>
        <input name="user_pswd" type="password" placeholder="Password" 
           class="form-control" />
    </div><br>       
    <input name="token" value="<?= $token ?>" type="hidden" />
    <button class="btn btn-info">LogIn</button>
</form>



<?php endif; ?>

<?php include __DIR__ . "./../footer.php"; ?>