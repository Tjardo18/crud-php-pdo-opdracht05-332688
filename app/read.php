<link rel="stylesheet" href="../style/style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<?php

require('lib/console_log.php');
require('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

$sql = "SELECT Id
              ,homeClub
              ,lidmaatschap
              ,looptijd
              ,extra
              ,mail
              ,AfspraakCreated
        FROM inschrijving
        ORDER BY homeClub ASC";

$statement = $pdo->prepare($sql);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $inschrijving) {
    $rows .= "<tr>
                <td>$inschrijving->Id</td>
                <td>$inschrijving->homeClub</td>
                <td>$inschrijving->lidmaatschap</td>
                <td>$inschrijving->looptijd</td>
                <td>$inschrijving->extra</td>
                <td>$inschrijving->mail</td>
                <td>$inschrijving->AfspraakCreated</td>
                <td>
                    <a href='delete.php?id={$inschrijving->Id}'>
                        <img src='img/b_drop.png' alt=''>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$inschrijving->Id}'>
                        <img src='img/b_edit.png' alt=''>
                    </a>
                </td>
             </tr>";
}
?>

<div class="card read">
    <h1>Overzicht inschrijvingen</h1>
    <table>
        <th>Id</th>
        <th>homeClub</th>
        <th>lidmaatschap</th>
        <th>looptijd</th>
        <th>extra</th>
        <th>mail</th>
        <th>AfspraakCreated</th>
        <th></th>
        <th></th>
        <tr>
            <?php echo $rows; ?>
        </tr>
    </table>
    <br>
    <div class="buttons">
        <a href="../index.php">
            <input type="submit" class="button" value="Nieuw">
        </a>
        <a href="truncate.php">
            <input type="submit" class="truncate" value="Truncate">
        </a>
    </div>
</div>