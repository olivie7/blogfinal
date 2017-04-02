<?php 	
					if(isset($errorText))
					{
						echo '<p class="text-danger">'.$errorText.'</p>';
					}
				 ?>



echo '<p class="text-info text-center">' . $success . '</p>';



$params =[
        "success" => $success,
        "errorsText" => $errorsText,
        "error" => $error,
        "successComment" => $successComment,
        ];
        $this->show('article/viewArticle', $params);




        id=" + premierID, // on passe l'id le plus récent au fichier de chargement",


        if(!empty($w_user))
		{
			$redirect = new AuthorizationModel();
			die($redirect->redirectToLogin());
		}



		//$this->redirectToRoute('article_viewArticle', ["id" => $post['id']]);



		<script type="text/javascript">
		setInterval(function()
		{
			
			$("#messages").load("../../../app/Model/CommentsModel.php",function(){

			});	
		},1000);
	</script>



	action="<?=$this->url('comment_addcomment');?>" 
