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
            <h2 class="text-center text-white">Crie sua conta</h2>
            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
              <div class="alert alert-danger mt-3"><?php echo session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if(!empty(session()->getFlashdata('success'))) : ?>
              <div class="alert alert-success mt-3"><?php echo session()->getFlashdata('success'); ?></div>
            <?php endif ?>
            <?php if($erros != '') : ; ?>
              <ul style="color: red;">
                <?php foreach($erros as $erro) : ?>
                  <li><?php echo $erro ?></li>
                <?php endforeach;?>
              </ul>
            <?php endif; ?>   
          </div>
        </div>

        <div class="row">
          <div class="col">
            <form action="<?php echo base_url('Login/signup'); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group mt-4">
                <input type="text" name="nome" style="background-color: #9146FF; color: black;" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 border-dark shadow-none" placeholder="Nome" value="<?php echo set_value('nome')?>" >
              </div>
              
              <div class="form-group">
                <input type="text" name="email" style="background-color: #9146FF; color: black;" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 border-dark shadow-none" placeholder="E-mail" value="<?php echo set_value('email');?>" >
              </div>

              <div class="form-group">
                <input type="password" name="senha" style="background-color: #9146FF; color: black;" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 border-dark shadow-none" placeholder="Senha">
              </div>
              
              <div class="mt-4 mb-4">
                <small class="form-text text-white">
                  Ao inscrever-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade, incluindo o Uso de Cookies. Outras pessoas poderão encontrar você pelo e-mail fornecido · Opções de Privacidade
                </small>
              </div>
              <button type="submit" style="background-color: #3E065F;" class="btn btn-block text-white">Inscrever-se</button>
              <a class="btn mt-2" href="<?php echo base_url('Login/login');?>">Já possuo conta, realizar login!</a>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>