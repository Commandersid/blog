<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloglijst</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php
        include('connectie.php');
        $bloglijst_query = "select blogtekst.titel, blogtekst.tekst, account.Naam, account.foto
        from blogtekst
        join account
        on blogtekst.account_ID = account.ID";
        $bloglijst_resultaat = $conn->query($bloglijst_query);
    ?>
</head>
    <body>
        <?php
            session_start();
            if($bloglijst_resultaat->num_rows > 0){
                while($rad = $bloglijst_resultaat->fetch_assoc()){
                    echo "<div id='blog'>
                            <div id='pictures'>
                                <img src='uploads/" . $rad['foto'] . "' class='items' id='images'> 
                            </div>
                            <div id='verhaal'>
                                <h3>" . $rad['titel'] . "</h3>
                                <p class='items'>" . $rad['tekst'] . "</p>
                            </div>
                        </div>
                        <br><hr><br>";
                }
            }
        ?>  
        <a href="welkom.php">
            <input type="button" name="terug" value="terug">
        </a>
    </body>
</html>