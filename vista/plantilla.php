
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Document</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<!-- FONTAWESOME  -->
		<script src="https://kit.fontawesome.com/e632F10729.js" crossorigin=anonyzous"></script>
</head>
<body>

<!--LOGO PRINCIPAL-->	
<div class="container-fluid">
  	<h1 class="text-center py-3">PROYECTO PURARES</h1>
  	<p>versión TEST</p>  	
</div>	

<!--BARRA DE NAVEGACION-->

<div class="container-fluid bg-light"> 
	<div class="container">


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Logo</a>
   <ul class="navbar-nav">

   		 <li class="nav-item">
   		 	<a class="nav-link" href="index.php?pagina=agregarOrdenProd">Orden de Producción</a>
   		 </li>
   		 <li class="nav-item">	
   		 	<a class="nav-link" href="index.php?pagina=verInsumos">Insumos</a>
		 </li>	
   		 <li class="nav-item">	
   		 	<a class="nav-link" href="index.php?pagina=verCarnes">Carnes</a>
		 </li>	  
		 <li class="nav-item">	
   		 	<a class="nav-link" href="index.php?pagina=verRecetas">Recetas</a>
		 </li>	

   </ul>
</nav>
	
	</div>
</div>

<div> 
	<div>

		<?php
			if (isset($_GET["pagina"])) {
				if($_GET["pagina"]=="agregarOrdenProd"||
				   $_GET["pagina"]=="verInsumos"||
				   $_GET["pagina"]=="verCarnes"||
				   $_GET["pagina"]=="verRecetas"||
				   $_GET["pagina"]=="agregarInsumo"){

				   	#var_dump($_GET["pagina"]);

					include "paginas/".$_GET["pagina"].".php";

				}else{
					include "paginas/error-404.php";
				}

			}else{
				include "paginas/agregarOrdenProd.php";	
			}

			

		?>
 
	</div>
</div>

</body>
</html>