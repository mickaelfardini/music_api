<?php
class API
{
	public static function defaultAction()
	{
		header("Content-Type: application/json");
		echo json_encode(["Error" => "Nothing to seek."]);
		return 0;
	}
	public static function artistsAction()
	{
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		$limit = isset($_GET['limit']) ? $_GET['limit'] : "9";
		$offset = isset($_GET['offset']) ? $_GET['offset'] : "0";
		$query = "SELECT artists.name as 'artist', artists.photo, artists.description, bio, albums.name as 'album', cover, cover_small
					FROM artists
					LEFT JOIN albums
					ON albums.artist_id = artists.id
					WHERE artists.name LIKE :name
					GROUP BY artists.name
					ORDER BY RAND()
					LIMIT :lim OFFSET :offset";
		$req = PDOConnect::prepareAction($query);
		$req->bindValue(":name", htmlspecialchars($name)."%");
		$req->bindValue(":lim", (int) htmlspecialchars($limit), PDO::PARAM_INT);
		$req->bindValue(":offset", (int) htmlspecialchars($offset), PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if (!$result)
		{
			echo json_encode(["error" => "No result"]);
			return 0;
		}
		echo $name == "" ? json_encode($result) : json_encode($result[0]);
		return 1;
	}
  
	public static function stylesAction()
	{
		$query = "SELECT name as 'style' FROM genres";
		$req = PDOConnect::prepareAction($query);
		$req->execute();
		echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));
		return 1;
	}
  
	public static function albumsAction()
	{
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		$limit = isset($_GET['limit']) ? $_GET['limit'] : "10";
		$offset = isset($_GET['offset']) ? $_GET['offset'] : "0";
		$query = "SELECT albums.name as 'album',  artists.name as 'artist', genres.name as 'gender',
						albums.cover, albums.popularity, albums.description, albums.release_date
					FROM albums
					LEFT JOIN artists ON albums.artist_id = artists.id
					RIGHT JOIN genres_albums ON genres_albums.album_id = albums.id 
					INNER JOIN genres ON genres.id = genres_albums.genre_id
					WHERE albums.name LIKE :name
					GROUP BY genres.id
					LIMIT :lim OFFSET :offset";
		$req = PDOConnect::prepareAction($query);
		$req->bindValue(":name", htmlspecialchars($name)."%");
		$req->bindValue(":lim", (int) htmlspecialchars($limit), PDO::PARAM_INT);
		$req->bindValue(":offset", (int) htmlspecialchars($offset), PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if (!$result)
		{
			echo json_encode(["error" => "No result"]);
			return 0;
		}
		foreach ($result as $key => $value)
		{
			$value["tracks"] = self::getTrack($value["album"]);
			$result[$key] = $value;
		}
		echo $name == "" ? json_encode($result) : json_encode($result[0]);
		return 1;
	}
	public static function searchAction()
	{
		$limit = isset($_GET['limit']) ? $_GET['limit'] : "9";
		$offset = isset($_GET['offset']) ? $_GET['offset'] : "0";
		$query = "SELECT artists.name as 'artist', artists.description as 'artist_description',
					artists.bio, artists.photo, albums.name as 'album',
					albums.description as 'album_description', albums.cover,
					albums.cover_small, albums.popularity,
					genres.name as 'gender', albums.release_date FROM artists
					INNER JOIN albums ON albums.artist_id = artists.id
					LEFT JOIN tracks ON tracks.album_id = albums.id
					RIGHT JOIN genres_albums ON genres_albums.album_id = albums.id
					INNER JOIN genres ON genres.id = genres_albums.genre_id
					WHERE artists.name LIKE :artist ";
		$query .= self::searchQuery();
		$req = PDOConnect::prepareAction($query);
		$req = self::bindSearch($req);
		$req->bindValue(":lim", (int) htmlspecialchars($limit), PDO::PARAM_INT);
		$req->bindValue(":offset", (int) htmlspecialchars($offset), PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if (!$result)
		{
			echo json_encode(["error" => "No result"]);
			return 0;
		}
		echo json_encode($result);
	}
	private static function bindSearch($req)
	{
		if (isset($_GET['track'])) {
			$req->bindValue(":track", htmlspecialchars($_GET['track']) ."%");
		}
		if (isset($_GET['album'])) {
			$req->bindValue(":album", htmlspecialchars($_GET['album']) ."%");
		}
		if (isset($_GET['gender'])) {
			$req->bindValue(":gender", htmlspecialchars($_GET['gender']) ."%");
		}
		$req->bindValue(":artist", htmlspecialchars($_GET['artist']) ."%");
		return $req;
	}
	private static function searchQuery()
	{
		$query = "";
		if (isset($_GET['track']))
		{
			$query .= "AND tracks.name LIKE :track ";
		}
		if (isset($_GET['album']))
		{
			$query .= "AND albums.name LIKE :album ";
		}
		if (isset($_GET['gender']))
		{
			$query .= "AND genres.name LIKE :gender ";
		}
		$query .= "GROUP BY albums.name LIMIT :lim OFFSET :offset";
		return $query;
	}
	private static function getTrack($album)
	{
		$query = "SELECT tracks.name as 'title', artists.name as 'artist', tracks.mp3,
						tracks.duration
					FROM tracks
					LEFT JOIN albums ON tracks.album_id = albums.id
					LEFT JOIN artists ON albums.artist_id = artists.id
					WHERE albums.name = :album";
		$req = PDOConnect::prepareAction($query);
		$req->bindValue(":album", htmlspecialchars($album));
		$req->execute();
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}