<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'CssStyles/allLinks.php';?>
</head>
<body style="background-color: #152028;">

    <div class="row py-5 px-4">
        <div class="col-xl-4 col-md-6 col-sm-10 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 bg-dark">
                    <div class="media align-items-end profile-header">
                        <div class="profile mr-3">
                            <img src="<?php echo base_url('img/user.png')?>" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                        </div>
                        <div class="media-body mb-5 text-white">
                            <a href="#" class="btn btn-dark btn-sm text-muted mt-2">Edit profile</a>
                            <h4 class="mt-2 mb-0"><?php echo $userinfo['nome']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"><?php echo $nummovies; ?></h5><small class="text-muted"> Filmes</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"><?php echo $numseries; ?></h5>
                            <small class="text-muted">Séries</small>
                        </li>
                    </ul>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Ultimos salvos</h5>
                        <a href="<?php echo base_url('User/collection')?>" class="btn btn-link text-muted">Mostrar todos</a>
                    </div>
                    <div class="row"> 
                        <?php foreach($last as $row) :?>
                        <?php if($row->tipo == 1) : ?>
                            <?php $movieurl = substr_replace($urlmovie, $row->id_saved, 35, 0); ?>
                            <?php $json_movie = file_get_contents($movieurl); ?>
                            <?php $obj_movie = json_decode($json_movie); ?>
                            <div class="col-lg-6 mb-2 pr-lg-1">
                            <img src="<?php echo $imgurl .= $obj_movie->poster_path ?>" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <?php $imgurl = 'https://image.tmdb.org/t/p/original'; ?> 
                        <?php endif; ?>
                        <?php if($row->tipo == 2) : ?>
                            <?php $serieurl = substr_replace($urlserie, $row->id_saved, 32, 0); ?>
                            <?php $json_serie = file_get_contents($serieurl); ?>
                            <?php $obj_serie = json_decode($json_serie); ?>
                            <div class="col-lg-6 mb-2 pr-lg-1">
                            <img src="<?php echo $imgurl .= $obj_serie->poster_path ?>" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <?php $imgurl = 'https://image.tmdb.org/t/p/original'; ?> 
                        <?php endif; ?>
                    <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>