<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$playlist_id = 15;

$sql = "SELECT tracks.name, tracks.composer FROM playlists, playlist_track, tracks WHERE playlists.playlistid = playlist_track.playlistid AND playlist_track.trackid = tracks.trackid AND playlists.playlistid = $playlist_id";

$statement = $dbcon->prepare($sql);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
   echo "<h4>".$row["name"]."</h4>"."<br>"."(".$row["composer"].")"."<br>"."<br>";
}

