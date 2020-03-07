
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

		<!--Agrego las librerias de jquery y bootstrap--> 
  
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <title>Gestion PURARES</title>
  <br>
  <div class="row justify-content-center align-items-center">
  <div class="col-md-auto">
  <h1>Sistema de gestión</h1>
   </div>
  <img src="https://drive.google.com/uc?export=download&id=1itN7NXRxavvm3yYDcmURhJ0DswNL_sqo">
  </div>
</head>

<body>

<!--BARRA DE NAVEGACION-->

<div class="container-fluid bg-light"> 
	<div class="container">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Logo</a>
   <ul class="navbar-nav">

		 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordenes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarOrdenProd">Nueva orden</a>
      <a class="dropdown-item" href="index.php">Ver ordenes</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Desbaste</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Nuevo desbaste</a>
      <a class="dropdown-item" href="index.php">Ver desbastes</a>
    </div>

		</li>
		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Carnes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Nueva carne</a>
      <a class="dropdown-item" href="index.php?pagina=verCarnes">Ver carnes</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Insumos</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=agregarInsumo">Nuevo insumo</a>
      <a class="dropdown-item" href="index.php?pagina=verInsumos">Ver insumos</a>
    </div>
		</li>

		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recetas</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Nueva receta</a>
      <a class="dropdown-item" href="index.php?pagina=verRecetas">Ver recetas</a>
    </div>
		</li>

   </ul>
</nav>
	
	</div>
</div>

<div> 
	<div>

		<?php
			if (isset($_GET["pagina"])) {
			#	if($_GET["pagina"]=="agregarOrdenProd"||
			#	   $_GET["pagina"]=="verInsumos"||
			#	   $_GET["pagina"]=="verCarnes"||
			#	   $_GET["pagina"]=="verRecetas"||
			#	   $_GET["pagina"]=="agregarInsumo"||
			#		$_GET["pagina"]=="agregarReceta"){

				   	#var_dump($_GET["pagina"]);

					include "paginas/".$_GET["pagina"].".php";

#				}else{
#					include "paginas/error-404.php";
#				}

#			}else{
				include "paginas/agregarOrdenProd.php";	
			}

			

		?>
 
	</div>
</div>

</body>
</html>