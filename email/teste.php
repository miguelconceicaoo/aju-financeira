<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="/jquery-3.3.1.min.js"></script>
</head>
<?php
include ("../conexao.inc.php");

?>
<body>


<div class="container topo">
                <div class="form-group">
			        <div class="input-group">
				    <span class="input-group-text">Buscar</span>
				    <input type="text" name="buscar" id="buscar" placeholder="Digite o nome" class="form-control" />
			        </div>
		        </div>
                    <div>
			        <div id="resultado"></div>
                    </div>
            </div>

            
<script type="text/javascript">

	function buscarNome(banco) {
		$.ajax({
			url: "search.php",
			method: "POST",
			data: {banco:banco},
			success: function(data){
				$('#resultado').html(data);
			}
		});
	}

	$(document).ready(function(){
		buscarNome();

		$('#buscar').keyup(function(){
			var banco = $(this).val();
			if (banco != ''){
				buscarNome(banco);
			}
			else
			{
				buscarNome();
			}
		});
	});



</script> 
</body>
</html>