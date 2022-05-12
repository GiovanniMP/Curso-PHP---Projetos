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
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger mt-3 text-center" style="width: 30rem;"><?php echo session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success mt-3 text-center " style="width: 30rem;"><?php echo session()->getFlashdata('success'); ?></div>
                <?php endif ?>
            <div class="row">
                <?php foreach($obj as $movie) :?>
                
                    <div class="card col-sm-3 mt-2 mr-2 pd-0 text-white" style="width: 18rem;background-color: #232B32">
                        <img class="card-img-top img-thumbnail" src="<?php echo $img .= $movie->poster_path; ?>" alt="">
                        <?php $img = str_replace($movie->poster_path, "", $img); ?>
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
                <?php  endforeach; ?>
            </div>
        </div>
    </div>
    
</body>
</html>