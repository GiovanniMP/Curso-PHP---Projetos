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
            <div class="row">
                <?php foreach($result as $row) :?>
                    <?php if($row->tipo == 1) : ?>
                        <?php $movieurl = substr_replace($url_movie, $row->id_saved, 35, 0); ?>
                        <?php $json_movie = file_get_contents($movieurl); ?>
                        <?php $obj_movie = json_decode($json_movie); ?>
                        
                            <div class="card col-md-3 mt-5 mr-2 pd-0 text-white" style="width: 18rem;background-color: #232B32">
                                <img class="card-img-top img-thumbnail" src="<?php echo $img .= $obj_movie->poster_path; ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $obj_movie->title; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $obj_movie->original_title; ?></h6>
                                    <?php $date = $obj_movie->release_date; ?>
                                    <?php $newDate = date("d-m-Y", strtotime($date)); ?>
                                    <h6><?php echo $newDate; ?></h6>
                                </div>
                                <div class="card-footer">
                                    <form action="<?php echo base_url('User/save'); ?>" method="POST">
                                        <button type="submit" class="btn btn-dark scolor ff ">Remover</button>
                                        <input type="hidden" name="id" value="<?php echo $obj_movie->id ?>">
                                        <input type="hidden" name="type" value="1">
                                    </form>
                                </div>
                            </div>    
                            <?php $img = 'https://image.tmdb.org/t/p/original'; ?> 
                    <?php endif; ?>
                    <?php if($row->tipo == 2) : ?>
                        <?php $serieurl = substr_replace($url_serie, $row->id_saved, 32, 0); ?>
                        <?php $json_serie = file_get_contents($serieurl); ?>
                        <?php $obj_serie = json_decode($json_serie); ?>
                        
                            <div class="card col-md-3 mt-5 mr-2 pd-0 text-white" style="width: 18rem;background-color: #232B32">
                                <img class="card-img-top img-thumbnail" src="<?php echo $img .= $obj_serie->poster_path; ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $obj_serie->name; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $obj_serie->original_name; ?></h6>
                                    <?php $date = $obj_serie->first_air_date; ?>
                                    <?php $newDate = date("d-m-Y", strtotime($date)); ?>
                                    <h6><?php echo $newDate; ?></h6>
                                </div>
                                <div class="card-footer">
                                    <form action="<?php echo base_url('User/save'); ?>" method="POST">
                                        <button type="submit" class="btn btn-dark scolor ff ">Salvar</button>
                                        <input type="hidden" name="id" value="<?php echo $obj_serie->id ?>">
                                        <input type="hidden" name="type" value="1">
                                    </form>
                                </div>
                            </div>    
                            <?php $img = 'https://image.tmdb.org/t/p/original'; ?> 
                    <?php endif; ?>
                <?php  endforeach; ?>
            </div>
        </div>
    </div>
    
</body>
</html>