<?php

require('lib/console_log.php');
require('config/config.php');
require('config/input.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

// extra
$extr = "";
foreach ($extra as $extr1) {
    $extr .= $extr1 . ", ";
}
$extra1 = rtrim($extr, ", ");

$sql = "INSERT INTO inschrijving (Id
                          ,homeClub
                          ,lidmaatschap
                          ,looptijd
                          ,extra
                          ,mail
                          ,AfspraakCreated)
        VALUES            (NULL
                          ,:hc
                          ,:ls
                          ,:lt
                          ,:xt
                          ,:ml
                          ,:ac);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':hc', $homeclub, PDO::PARAM_STR);
$statement->bindValue(':ls', $lidmaatschap, PDO::PARAM_STR);
$statement->bindValue(':lt', $looptijd, PDO::PARAM_STR);
$statement->bindValue(':xt', $extra1, PDO::PARAM_STR);
$statement->bindValue(':ml', $mail, PDO::PARAM_STR);
$statement->bindValue(':ac', $timeSend, PDO::PARAM_STR);

$statement->execute();

echo 'Het invoeren is gelukt!';

header('Location: read.php');
