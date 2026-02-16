<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="kepek/pfp.png" type="image/x-icon">
    <title>Pollák Ötletdoboz</title>
</head>

<body>
    <section id="uzenetkuldes">
        <h1>Pollák Ötletdoboz</h1>
        <form action="send.php" method="post">
            <div id="nevcheckdiv">
                <input type="checkbox" name="nevcheck" value="nevcheck" id="nevcheck">
                <input type="text" id="felhnev-ph" name="felhnev-ph" placeholder="Felhasználónév" readonly>
                <input type="text" id="felhnev" name="felhnev" placeholder="Felhasználónév">
                <p>(nem kötelező)</p>
            </div>
            <div id="uzenet">
                <textarea name="otlet" id="otlet" cols="50" rows="6" placeholder="Írd ide az ötleted" required></textarea>
                <button>Küldés</button>
            </div>
        </form>
        <p id="teaser">👇 Nézd meg az eddigi ötleteket 👇</p>
    </section>
    <hr id="hr">
    <section id="otletek">
        <!--
        <div class="kartya">
            <div id="kartya-adatok">
                <h3 id="fnev">Felhasználónév</h3>
            </div>
            <div id="bottom">
                <img src="kepek/like.png" alt="lájk" class="kepek">
                <img src="kepek/dislike.png" alt="diszlájk" class="kepek">
                <img src="kepek/share.png" alt="megosztás" class="kepek">
            </div>
        </div>
    -->
        <?php
        require "connect.php";
        $cmd = $conn->prepare("SELECT * FROM " . $table);
        $cmd->execute();
        $result = $cmd->get_result();

        foreach ($result as $key => $value) {
            $id = $value["id"];
            $fnev = $value["fnev"];
            if ($fnev == "") $fnev = "Anonim";
            $otlet = $value["otlet"];
            $datum = $value["datum"];
            $szavazatok = $value["szavazatok"];
            $elfogadott = $value["elfogadott"];
            echo '<div class="kartya"><div id="kartya-adatok"><h3 id="fnev">' . $fnev . '</h3></div><p>' . $otlet . '</p><div id="bottom"><img src="kepek/like.png" alt="lájk" class="kepek"><img src="kepek/dislike.png" alt="diszlájk" class="kepek"><img src="kepek/share.png" alt="megosztás" class="kepek"></div></div>';
        }
        ?>
    </section>

</body>

</html>