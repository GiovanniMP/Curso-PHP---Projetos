<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'CssStyles/allLinks.php';?>
</head>
<body class="backgroundHome">
    <header>
            <nav class="navbar navbar-expand-md" style="background-color: #1E1C1C">
                <div class="container-fluid">
                    <a class="navbar-brand fflg scolor" href="<?php base_url('Home/index') ?>">Rank It TV</a>
                    <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link fflg scolor" href="<?php echo base_url('Login/login')?>">Login</a>
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link fflg scolor" href="<?php echo base_url('Login/signup')?>">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 pt-2">
				<div class="row h-100 justify-content-center align-items-center">
					<div>
						<div class="communicationItem">
							<i class="fa-solid fa-ranking-star fa-2x mr-3"  style="color: #000000"></i>
							<label style="color: #000000;">Ranqueie seus filmes e séries favoritos.</label>
						</div>
						<div class="communicationItem">
							<br>
							<i class="fa-solid fa-circle-plus fa-2x mr-3" style="color: #000000"></i>
							<label style="color: #000000;">Adicione todos os programas que você gosta.</label>
						</div>
						<div class="communicationItem">
							<br>
							<i class="fa-solid fa-list-check fa-2x mr-3"  style="color: #000000;"></i>
							<label  style="color: #000000;">Acompanhe todos seus filmes e séries assistidos.</label>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 pt-4 pl-5 pr-5" >
				<div class="row pt-5 pl-5 pr-5">
					<div class="col pl-5 pr-5 text-center">
						<img class="img-fluid" src="<?=base_url('img/iconSimple.png')?>" alt="RankItTV">
						<h1 class="title ffxl" style="color: #000000;">Siga todos os filmes, séries e animes que você ama.</h1>
						<h2 class="mt-5 subtitle ffxl" style="color: #000000;">Participe hoje do Rank it TV</h2>
						<a href="<?php echo base_url('Login/signup')?>" class="btn btn-block mt-4 mb-3 mg-2" style="background-color: #9146FF; color: white">Criar Conta</a>
					</div>	
				</div>
			</div>
		</div>
	</div>
    
</body>
</html>