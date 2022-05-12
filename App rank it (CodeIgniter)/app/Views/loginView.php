<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'CssStyles/allLinks.php';?>
</head>
<body style="background-color: #3E065F">
  <div class="container" >
    <div class="d-flex justify-content-center " style="margin-top: 10rem;">
      <div class="card" style="width: 30rem; background-color: #9146FF">
        <div class="card-body">
          <div class="d-flex justify-content-center">
            <img width="150rem" src="<?php echo base_url('img/iconSimple.png') ?>" />
          </div>
          <div class="row">
            <div class="col">
              <form class="mt-3" action="<?php echo base_url('Login/check'); ?>" method="post">
              <?php echo csrf_field();?>

              <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger mt-3"><?php echo session()->getFlashdata('fail'); ?></div>
              <?php endif ?>
              
                <div class="form-group">
                  <input type="text" style="background-color: #9146FF; color: black;" name="email" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 border-dark shadow-none" placeholder="E-mail" value="<?php echo set_value('email');?>">
                  <span class="text-danger"><?php echo isset($validation) ? display_error($validation, 'email') : '' ?>
                  </span>
                </div>
                <div class="form-group">
                  <input type="password" style="background-color: #9146FF; color: black;" name="senha" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 border-dark shadow-none" placeholder="Senha">
                  <span class="text-danger"><?php echo isset($validation) ? display_error($validation, 'senha') : '' ?>
                  </span>
                </div>
                <button type="submit" style="background-color: #3E065F; margin-top: 2rem;" class="btn btn-block text-white mb-4">Log in<i class="fa-solid fa-right-to-bracket ml-3"></i></button>
                <div class="text-center">
                  <a href="" class="btn">Esqueci minha senha</a>
                  <a href="<?php echo base_url('Home')?>" class="btn">Voltar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>