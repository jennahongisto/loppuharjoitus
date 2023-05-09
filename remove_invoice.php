<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$invoice_item_id = 1;

$sql = "DELETE FROM invoice_item WHERE id=$invoice_item_id";

$dbcon->exec($sql);