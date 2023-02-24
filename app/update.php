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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $extra = $_POST['extra'];

        // extra
        $extr = "";
        foreach ($extra as $extr1) {
            $extr .= $extr1 . ", ";
        }
        $extra1 = rtrim($extr, ", ");

        $sql = "UPDATE inschrijving SET 
                                homeClub = :hc
                                ,lidmaatschap = :ls
                                ,looptijd = :lt
                                ,extra = :xt
                                ,mail = :ml
                                ,AfspraakCreated = :ac
                WHERE Id = :id;";

        $yee = $pdo->prepare($sql);
        $yee->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $yee->bindValue(':hc', $_POST['homeclub'], PDO::PARAM_STR);
        $yee->bindValue(':ls', $_POST['lidmaatschap'], PDO::PARAM_STR);
        $yee->bindValue(':lt', $_POST['looptijd'], PDO::PARAM_STR);
        $yee->bindValue(':xt', $extra1, PDO::PARAM_STR);
        $yee->bindValue(':ml', $_POST['mail'], PDO::PARAM_STR);
        $yee->bindValue(':ac', $_POST['timeSend'], PDO::PARAM_STR);
        $yee->execute();

        echo "Het updaten is gelukt!";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        // error
        echo "Het updaten is mislukt!";
        console_log($e->getMessage());
        header('Refresh:3; url=read.php');
    }

    exit();
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
    <title>Update</title>
</head>

<body>

    <div class="card">
        <h1>Inschrijving Update</h1>
        <form action="update.php" method="POST">

            <div class="inputVeld">
                <label for="homeclub">
                    Kies je homeclub:<br>
                    <select name="homeclub" id="homeclub" required>
                        <option value="Herculesplein">Herculesplein 375-77</option>
                        <option value="Moreelsehoek">Moreelsehoek 2</option>
                        <option value="Europaplein">Europaplein 705</option>
                        <option value="Franciscusdreef">Franciscusdreef 80</option>
                        <option value="Goedhartplein">Van Heuven Goedhartplein 13</option>
                        <option value="Middenwetering">Middenwetering 21</option>
                        <option value="Zonnebaan">Zonnebaan 22</option>
                        <option value="Beneluxlaan">Beneluxlaan 21-23</option>
                        <option value="Westerdijk">Westerdijk 2</option>
                    </select>
                </label>
            </div>

            <div class="inputVeld">
                <label for="lidmaatschap">
                    Selecteer een lidmaatschap:<br>
                </label>
                <input type="radio" id="lidmaatschap" name="lidmaatschap" value="comfort">
                <label for="comfort">Comfort</label><br>
                <input type="radio" id="lidmaatschap" name="lidmaatschap" value="premium" checked>
                <label for="premium">Premium</label><br>
                <input type="radio" id="lidmaatschap" name="lidmaatschap" value="allIn">
                <label for="allIn">All in</label>
            </div>


            <div class="inputVeld">
                <label for="looptijd">
                    Looptijd:<br>
                </label>
                <input type="radio" id="looptijd" name="looptijd" value="jaar">
                <label for="jaar">Jaarlidmaatschap</label><br>
                <input type="radio" id="looptijd" name="looptijd" value="flex" checked>
                <label for="flex">Flex optie</label>
            </div>

            <div class="inputVeld">
                <label for="extra">
                    Selecteer je extra's:<br>
                    <input type="checkbox" id="extra" name="extra[]" value="yanga">
                    <label for="yanga">Yanga Sportswater €2,50 per 4 weken</label><br>

                    <input type="checkbox" id="extra" name="extra[]" value="onlineCoach">
                    <label for="onlineCoach">Personal online coach €60,- eenmalig</label><br>

                    <input type="checkbox" id="extra" name="extra[]" value="personalIntro">
                    <label for="personalIntro">Personal training intro €25,- eenmalig</label><br>
                </label>
            </div>

            <div class="inputVeld">
                <label for="mail">
                    E-mail:
                    <input type="email" name="mail" id="mail" placeholder="example@example.com" required>
                </label>
            </div>

            <input type="hidden" name="timeSend" id="timeSend" value="">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

            <input class="button" type="submit" value="Sla op" onmouseenter="tijdValue()">
            <input class="button" type="reset" value="Reset">

        </form>
    </div>

    <script src="../js/script.js"></script>

</body>

</html>