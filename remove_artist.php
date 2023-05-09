<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$artist_id = 2;

try {
    $dbcon->beginTransaction();

    $dbcon->exec("DELETE FROM invoice_items WHERE trackid BETWEEN 2 AND 5");
    $dbcon->exec("DELETE FROM playlist_track WHERE trackid BETWEEN 2 AND 5");
    $dbcon->exec("DELETE FROM tracks WHERE albumid = 2 OR albumid = 3");
    $dbcon->exec("DELETE FROM albums WHERE artistid = $artist_id");
    $dbcon->exec("DELETE FROM artists WHERE artistid = $artist_id");

    $dbcon->commit();
} catch (Exception $e) {
    $dbcon->rollBack();
    echo "Failed:".$e->getMessage();
}