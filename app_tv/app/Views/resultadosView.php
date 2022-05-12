<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'CssStyles/allLinks.php';?>
</head>
<body style="background-color: #152028;">
    <div class="wrapper d-flex">
        <div class="sidebar" style="margin-right: 10rem;"> <small class="text-muted pl-3">WIDR PAY</small>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="#"><i class="far fa-credit-card"></i>Payment Page <img src="https://img.icons8.com/material-outlined/24/000000/new.png" /></a></li>
                <li><a href="#"><i class="fas fa-file-invoice"></i>Invoices <img src="https://img.icons8.com/material-outlined/24/000000/2.png" /></a></li>
            </ul> <small class="text-muted px-3">PRODUCTIVITY TOOLS</small>
            <ul>
                <li><a href="#"><i class="far fa-calendar-alt"></i>Online Scheduler</a></li>
                <li><a href="#"><i class="fas fa-video"></i>Video Meeting</a></li>
                <li><a href="#"><i class="fas fa-id-badge"></i>Public Profile</a></li>
            </ul> <small class="text-muted px-3">GROW YOUR CLIENT BASE</small>
            <ul>
                <li><a href="#"><i class="fas fa-external-link-alt"></i>Share</a></li>
                <li><a href="#"><i class="fas fa-code"></i>Add to Website</a></li>
            </ul>
        </div>

        <div class="container">
            <h2 class=" mt-3 bold text-white">Resultados da busca: <?php echo $busca; ?></h2>
            <div class="row">
                <?php if($tipo == 1) : ?>
                <?php foreach($buscaFilme as $movie) :?>
                    
                        <div class="card col-md-3 mt-5 mr-2 pd-0 text-white" style="width: 18rem;background-color: #232B32">
                            <img class="card-img-top img-thumbnail" src="<?php echo $img .= $movie->poster_path; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $movie->title; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $movie->original_title; ?></h6>
                                <?php $date = $movie->release_date; ?>
                                <?php $newDate = date("d-m-Y", strtotime($date)); ?>
                                <h6><?php echo $newDate; ?></h6>
                                <h6><?php echo $categoria; ?></h6>
                            </div>
                            <div class="card-footer">
                                <form action="<?php echo base_url('User/save'); ?>" method="POST">
                                    <button type="submit" class="btn btn-dark scolor ff ">Salvar</button>
                                    <input type="hidden" name="id" value="<?php echo $movie->id ?>">
                                    <input type="hidden" name="type" value="1">
                                </form>
                            </div>
                        </div>    
                        <?php $img = 'https://image.tmdb.org/t/p/original'; ?> 
                <?php  endforeach; ?>
                <?php endif; ?>
                
                <?php if($tipo == 2) : ?>
                <?php foreach($buscaSerie as $serie) :?>
                    
                    <div class="card col-md-3 mt-5 mr-2 pd-0 text-white" style="width: 18rem;background-color: #232B32">
                        <img class="card-img-top img-thumbnail" src="<?php echo $img .= $serie->poster_path; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $serie->name; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $serie->original_name; ?></h6>
                            <?php $date = $serie->first_air_date; ?>
                            <?php $newDate = date("d-m-Y", strtotime($date)); ?>
                            <h6><?php echo $newDate; ?></h6>
                            <h6><?php echo $categoria; ?></h6>
                        </div>
                        <div class="card-footer">
                            <form action="<?php echo base_url('User/save'); ?>" method="POST">
                                <button type="submit" class="btn btn-dark scolor ff ">Salvar</button>
                                <input type="hidden" name="id" value="<?php echo $serie->id ?>">
                                <input type="hidden" name="type" value="2">
                            </form>
                        </div>
                    </div>    
                    <?php $img = 'https://image.tmdb.org/t/p/original'; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</body>
</html>