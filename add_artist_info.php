<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$artistId = $_POST['artistId'];
$artistName = $_POST['artistName'];

$sql = "INSERT INTO artists(ArtistId, Name) VALUES(?, ?)";
$statement = $dbcon->prepare($sql);
$statement->execute(array($artistId, $artistName));

$albumId = $_POST['albumId'];
$albumTitle = $_POST['albumTitle'];

$sql = "INSERT INTO albums(AlbumId, Title, ArtistId) VALUES(?, ?, 2)";
$statement = $dbcon->prepare($sql);
$statement->execute(array($albumId, $albumTitle));

$trackId = $_POST['trackId'];
$trackName = $_POST['trackName'];
$composer = $_POST['composer'];
$millisecond = $_POST['mseconds'];
$bytes = $_POST['bytes'];
$price = $_POST['price'];

$sql = "INSERT INTO tracks(trackId, Name, MediaTypeId, GenreId, Composer, Milliseconds, Bytes, Unitprice) VALUES(?, ?, 1, 1, ?, ?, ?, ?)";
$statement = $dbcon->prepare($sql);
$statement->execute(array($trackId, $trackName, $composer, $millisecond, $bytes, $price));


