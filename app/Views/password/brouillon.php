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