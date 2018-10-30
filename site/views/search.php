<!doctype html>
<html ng-app="search">
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
						<a class="nav-link" href="/MusicAPI/MVC_Micka/search/">Search</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div ng-controller="Search" class="container">
	<div class="container bg-secondary text-white rounded">
		<h1>Search</h1>
		<form ng-submit="Search()">
			<div class="form-row">
				<div class="form-group col-4">
					<label>Artist</label>
					<input type="text" value="" class="form-control" ng-model="srchArtist" placeholder="Ex : Pere Fouras ...">
				</div>
				<div class="form-group col-4">
					<label>Album</label>
					<input value="" type="text" class="form-control" ng-model="srchAlbum" placeholder="Ex : My Little Pony ...">
				</div>
				<div class="form-group col-4">
					<label for="inputGender">Genre</label>
					<select id="inputGender" ng-model="srchStyle" class="form-control">
						<option selected value="">Genre</option>
						<option ng-repeat="style in gender" value="{{style.style}}">{{style.style}}</option>
					</select>
				</div>
			</div>
			<div class="form-row">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
		<!-- Page Heading -->
		<h1 class="my-4">Search</h1>

		<div class="row">
			<div ng-repeat="artist in artists" class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="{{artist.cover}}" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">{{artist.artist}}</a>
						</h4>
						<p class="card-text">{{artist.description}}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

		<!-- Pagination -->
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">1</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">2</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#">3</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- /.container -->

	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
		<!-- /.container -->
	</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="js/test.js"></script>
</body>
</html>