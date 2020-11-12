<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="icon" href="../../../../favicon.ico">
    	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
			
			<title>CEMEA CRM</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="jumbotron.css" rel="stylesheet">
	</head>
		<body>
			<h1><?php echo $title; ?></h1>
			    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      				<a class="navbar-brand" href="#">CEMEA-CRM</a>
      				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        				<span class="navbar-toggler-icon"></span>
      				</button>

      					<div class="collapse navbar-collapse" id="navbarsExampleDefault">
        					<ul class="navbar-nav mr-auto">
          						<li class="nav-item active">
          							<i class="fas fa-clipboard"></i>
            						<a class="nav-link" href="home">Tableau de bord<span class="sr-only">(current)</span></a>
          						</li>
          						<li class="nav-item">
          							<i class="fas fa-coins"></i>
          							<a class="nav-link" href="formations">Gestion de payement</a>
          						</li>
         	    				<li class="nav-item">
         	    					<i class="fas fa-user-cog"></i>
         	    					<a class="nav-link" href="contact">Gestion membres</a>
            							<ul class="dropdown-menu">
            								<li><i class="fas fa-pen-nib"></i><a href="#">Inscription</a></li> 
    										<li><i class="fas fa-users"></i><a href="#">Participants</a></li> 
    										<li><i class="fas fa-edit"></i><a href="#">Actions</a></li> 
    										<li role="separator" class="divider"></li> 
            							</ul>
          						</li>
          						<li class="nav-item">
          							<i class="fas fa-tasks"></i>
          							<a class="nav-link" href="formations">Requête</a>
          						</li>
          						<li class="nav-item">
          							<i class="fas fa-flag-checkered"></i>
          							<a class="nav-link" href="formations">Suivi</a>
          						</li>
          						<li class="nav-item">
          							<i class="fas fa-file-export"></i>
          							<a class="nav-link" href="formations">Exportation</a>
          						</li>
          						<li class="nav-item">
          							<i class="fas fa-mouse-pointer"></i>
          							<a class="nav-link" href="formations">Sélection des destinataires</a>
          						</li>
                      <li class="nav-item">
                        <a class="nav-link" href="signinup">Connexion</a>
                      </li>
         					</ul>
        				<form class="form-inline my-2 my-lg-0 pull-right">
          					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
        				</form>
      					</div>
    			</nav>

			<script src="jquery-3.3.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
		</body>
</html>