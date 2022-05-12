<nav class="navbar navbar-expand-lg" style="background-color: #1E1C1C">
    <a class="navbar-brand ff mr-5 scolor" href="<?php echo base_url('User') ?>">Rank It TV</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-3">
                <a class="nav-link ff scolor" href="<?php echo base_url('User/collection')?>"><i class="zmdi zmdi-collection-case-play mr-2"></i>Sua coleção</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link ff scolor" href="<?php echo base_url('User')?>"><i class="zmdi zmdi-collection-plus mr-2"></i>Adicionar a coleção</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link ff scolor" href="<?php echo base_url('User/profile')?>"><i class="fa-solid fa-user mr-2"></i>Perfil</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link ff scolor" href="<?php echo base_url('Login/logout')?>"><i class="fa-solid fa-right-from-bracket mr-2"></i></i>Logout</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('User/search'); ?>" method="post">
        <div class="form-group ">
            <div class="input-group"> 
                <select name="selectmenu" class="custom-select mr-3 border-top-0 border-right-0 border-left-0  border-dark shadow-none" style="background-color: #9146FF;color: black;">
                    <option selected value="1">Filmes</option>
                    <option value="2">Séries</option>
                </select>
            </div> 
            <div class="input-group">
                <div class="input-group-addon rounded-left" style="background-color: #9146FF;">
                    <i class="fa-solid fa-magnifying-glass icon"></i>
                </div>
                <input type="search" style="background-color: #9146FF; color: black;" name="busca" class="form-control mr-sm-2 border-top-0 border-right-0 border-left-0  border-dark shadow-none" placeholder="Buscar">
            </div>
        </div>
        </form>
  </div>
</nav>