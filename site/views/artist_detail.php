<!doctype html>
<html ng-app="artistDetail">
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
					<li class="nav-item active">
						<a class="nav-link" href="/MusicAPI/MVC_Micka/artists/">Artists</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/MusicAPI/MVC_Micka/styles/">Styles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div ng-controller="ArtistDetail" class="container">

		<!-- Page Heading -->
		<h1 class="my-4">{{artist.artist}}
		</h1>

		<div class="row">
			<div class="col-5">
				<img ng-src="{{artist.photo}}" ng-alt="{{artist.artist}}">
			</div>
			<div class="col-7">
				<h4><b>Name</b> :</h4>
				<h5>{{artist.artist}}</h5>
				<br>
				<h5><b>Albums</b> :</h5>
				<p ng-repeat="album in albums">
					<a href="/MusicAPI/MVC_Micka/albums/{{album.album}}">{{album.album}}</a>
				</p>
				<br>
				<h5><b>Description</b> :</h5>
				<p>{{artist.description}}</p>
				<br>
				<h5><b>Bio</b> :</h5>
				<p>{{artist.bio}}</p>
				<p><small class="text-muted"></small></p>
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