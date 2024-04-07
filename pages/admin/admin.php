<!DOCTYPE html>
<html>
<head>
    <title>Interface administrateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="pages/admin/assets/stylesAdmin.css">
</head>
<body>

<div class="container">
    <h1>Interface administrateur</h1>
    <div class="row mt-5">
    <?php
    $listeUsers = ControllerAdmin::getListeUsers();
     foreach($listeUsers as $userDTO) { ?>
        <div class="col-md-4">
            <div class="card mb-3 border-red">
                <div class="card-body">
                    <div class="media">
                        <img src="pages/connexion/assets/images/<?php echo $userDTO->getPicture(); ?>" class="user-profile-img mr-3" alt="Photo de profil">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $userDTO->getUsername(); ?></h5>
                            <?php 
                            if($userDTO->getId_role() == 4){
                                echo '<a href="index.php?page=admin&value=3&id='.$userDTO->getId().' " class="btn btn-success">Débannir</a>';
                            }
                            else{
                                echo '<a href="index.php?page=admin&value=4&id='.$userDTO->getId().'" class="btn btn-danger">Bannir</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
        
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
