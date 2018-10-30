<!doctype html>
<html ng-app="styleDetail">
<head>
	<title>Weezer</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><img width="4%" src="https://cdn.worldvectorlogo.com/logos/deezer.svg" alt="Weezer"> Weezer</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/MusicAPI/MVC_Micka/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/MusicAPI/MVC_Micka/artists/">Artists</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/MusicAPI/MVC_Micka/styles/">Styles</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">styles</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div ng-controller="StyleDetail" class="container">

		<!-- Page Heading -->
		<h1 class="my-4">{{ style }}
		</h1>

		<div class="row">
			<div ng-repeat="album in styles" class="col-lg-4 col-sm-6 card-item">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" ng-src="{{album.cover}}" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="/MusicAPI/MVC_Micka/albums/{{album.album}}">{{album.album}}</a>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
		<!-- /.container -->
	</footer>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
	<script src="js/test.js"></script>
</body>
</html>