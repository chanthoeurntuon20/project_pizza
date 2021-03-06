<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  
  <div class="auth__header">
    <div class="auth__logo">
      <img height="90" src="images/logo.svg" alt="">
    </div>
  </div>
     
    <form class="auth__form" autocomplete="off" action="login" method="post">
      <div class="auth__form_body">
        <!-- message success register if user fill correct form register-->
        <?php if(session()->get('success')) :?>
            <div class="alert alert-success" role="alert"><?= session()->get('success') ?></div>
        <?php endif; ?>
        <!-- message error when user fill information incorrect login form-->
        <?php if(session()->get('error')): ?>
				<div class="alert alert-danger alert-dismissible fade show">
				    <?= session()->get('error')->listErrors() ?>
				</div>
	    <?php endif ?>
        <h3 class="auth__form_title">Peperoni App</h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" placeholder="Enter email" name = "email">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name = "password">
          </div>
        </div>
      </div>
      
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="/signup" class="small text-uppercase">
            CREATE ACCOUNT
          </a>
        </div>
      </div>
     
    </form>
  </div>
</div>
<?= $this->endSection() ?>