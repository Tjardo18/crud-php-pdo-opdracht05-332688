<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="app/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>Basic Fit Utrecht</title>
</head>
</head>

<body>

    <div class="card">
        <h1>Basic-Fit Utrecht</h1>
        <form action="app/create.php" method="POST">

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

            <!-- <div class="buttons"> -->
                <input class="button" type="submit" value="Sla op" onmouseenter="tijdValue()">
                <input class="button" type="reset" value="Reset">
            <!-- </div> -->
        </form>
    </div>

    <script src="js/script.js"></script>
</body>

</html>