
<head>
	<title>Conversation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="pages/message/assets/stylesMessage.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-offset-2 mt-5">
				<div class="panel panel-default">

					<div class="panel-body">
						<ul class="chat d-flex flex-column flex-nowrap">
                            <?php
                                $listeMessage = ControllerMessage::getListeMessage();
                                foreach($listeMessage as $messageDTO){
                                    if($messageDTO->getIdUser() == $_SESSION['id']):?>
                                        <li class="right clearfix  ml-auto">
                                            <div class="row">
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">Vous</strong> <small class="text-muted"> il y a <?php echo ControllerMessage::diffTime($messageDTO->getHeure()); ?></small>
                                                    </div>
                                                    <p>
                                                        <?php echo $messageDTO->getContent(); ?>
                                                    </p>
                                                </div>
                                            </div>
								        </li>
                                    <?php
                                    else :?>
                                        <li class="left clearfix" ><span class="chat-img pull-left">
                                            <div class="row">
                                                <div class="chat-body clearfix">
									                <div class="header">
										                <strong class="primary-font"><?php echo  ControllerMessage::getName($messageDTO->getIdUser()); ?></strong> <small class="text-muted">il y a <?php echo ControllerMessage::diffTime($messageDTO->getHeure()); ?></small>
									                </div>
									                <p>
                                                        <?php echo $messageDTO->getContent(); ?>
                                                        </p>
                                                </div>
                                            </div>
								        </li>
                                    <?php endif;
                                }
                            ?>	
						</ul>
						<div class="panel-footer mb-5">
                            <form action="index.php?page=Message" method="post">
							<div class="input-group">
								<input id="btn-input" type="text" class="form-control input-sm" placeholder="Taper votre message ici..." name="content">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-sm" id="btn-chat">Envoyer</button>
								</span>
							</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



