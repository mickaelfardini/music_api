angular.module('index', [])
.controller('Index', function($scope, $http) {
	var reqArtist = this;
	$http.get('http://localhost/MusicAPI/api/artists/?limit=9')
	.then(function(response) {
		$scope.artists = response.data;
	});
});

angular.module('search', [])
.controller('Search', function($scope, $http) {
	var reqArtist = this;
	$http.get('http://localhost/MusicAPI/api/artists/?limit=9')
	.then(function(response) {
		$scope.artists = response.data;
	});

	$http.get('http://localhost/MusicAPI/api/styles')
	.then(function(response) {
		$scope.gender = response.data;
	});

	$scope.Search = function() {
		var artist = $scope.srchArtist == null ? "" : $scope.srchArtist;
		var album = $scope.srchAlbum == null ? "" : $scope.srchAlbum;
		var style = $scope.srchStyle == null ? "" : $scope.srchStyle;
		$http.get('http://localhost/MusicAPI/api/search/?artist='+
			artist+'&gender='+style+'&album='+album+'&limit=9')
		.then(function(response) {
			$scope.artists = response.data;
		});
	};
});

angular.module('artist', [])
.controller('Artists', function($scope, $http) {
	var reqArtist = this;
	$http.get('http://localhost/MusicAPI/api/artists/?limit=9')
	.then(function(response) {
		$scope.artists = response.data;
	});
});

angular.module('artistDetail', [])
.controller('ArtistDetail', function($scope, $http) {
	var req = window.location.href.match(/([a-zA-Z0-9%\s]+)$/)[0];
	$http.get("http://localhost/MusicAPI/api/artists/"+req+"/?limit=1")
	.then(function(response) {
		$scope.artist = response.data;
	});
	$http.get("http://localhost/MusicAPI/api/search/?artist="+req)
	.then(function(response) {
		$scope.albums = response.data;
	});
});

angular.module('albumDetail', [])
.controller('AlbumDetail', function($scope, $http) {
	var req = window.location.href.match(/([a-zA-Z0-9%\(\)\s]+)$/)[0];
	$http.get('http://localhost/MusicAPI/api/albums/'+req+'/?limit=9')
	.then(function(response) {
		$scope.album = response.data;
	});
});

angular.module('style', [])
.controller('Styles', function($scope, $http) {
	// var req = window.location.href.match(/([a-zA-Z0-9%\(\)\s]+)$/)[0];
	$http.get('http://localhost/MusicAPI/api/styles/')
	.then(function(response) {
		$scope.styles = response.data;
	});
});


angular.module('styleDetail', [])
.controller('StyleDetail', function($scope, $http) {
	var req = window.location.href.match(/([a-zA-Z0-9%\(\)\s]+)$/)[0];
	$http.get('http://localhost/MusicAPI/api/search/?artist=&gender='+req+'&limit=9')
	.then(function(response) {
		$scope.styles = response.data;
		$scope.style = req;
		console.log($scope.styles)
	});
});