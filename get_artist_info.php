<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$artist_id = 1;

$sql = "SELECT artists.name AS artist, albums.title AS album, tracks.name AS tracks FROM artists, albums, tracks WHERE artists.artistid = albums.artistid AND albums.albumid = tracks.albumid AND artists.artistid = $artist_id";

$statement = $dbcon->prepare($sql);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$data = array();

foreach($result as $row){
    $artist = $row['artist'];
    $album = $row['album'];
    $track = $row['tracks'];

    if(!isset($data[$artist])) {
        $data[$artist] = array();
    }

    if(!isset($data[$artist][$album])) {
        $data[$artist][$album] = array();
    }

    $data[$artist][$album][] = $track;
}

$json = json_encode($data);

header('content-type: application/json');
echo $json;