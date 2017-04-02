<?php
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table id="body">

<tr>
<td id="titre">Chat en Ajax avec PHP et JQuery</td>
</tr>

<tr >

<td style="height:500px">

<div id="chat_aff"></div>

</td>

</tr>

<tr >

<td id="form" valign="top">

<table id="form2">
<tr>
	<td style="width:30%">
	<label for="name" style="font-family:Comic Sans MS;">Pseudo</label>
	</td>
	<td style="width:60%">
	<label for="message" style="font-family:Comic Sans MS;">Message</label>
	</td>
	<td></td>

</tr>
<tr>
	<td>
	<input id="name" type="text"  maxlength="20" />
	</td>

	<td>
	<input id="message" type="text" maxlength="250"  />
	</td>
	
	<td>
	
	<button id="submit">Envoyer</button>
	
	</td>
</tr>

</table>


</td>

</tr>

</table>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>

	setInterval(function()
	{
	$("#chat_aff").load("chat_control.php",function(){});	
	},1000);
	

	$("#submit").click(function()
	{
	var name =  $("#name").val();
	
	var message = $("#message").val();
	
	$("#message").val("");
	
	$.ajax({
		async: false ,
		type: 'GET',
		url: 'chat_control.php?name='+name+'&message='+message
		
	});
	
	});


</script>
</body>
</html>



<link rel="stylesheet" href="chat.css"/>
