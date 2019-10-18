<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog formulier</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php
        include('connectie.php');
    ?>
</head>
<body>
    <form name="blog" method="post" enctype="multipart/form-data" action="">
        titel
        <br>
        <input required type="text" name="titel" placeholder="titel" />
        <br>
        Maximum 1000 karakters lang
        <br>
        <textarea name="text" id="text">
        </textarea>
        <br>
        <input type="submit" name="verzend" value="verzend" />
    </form>
    <a href="welkom.php">
        <input type="button" name="terug" value="terug">
    </a>
    <?php
        session_start();
        //Gebruikersnaam ophalen
        $gebruiker = $_SESSION['USER'];
        //Query om account ID op te halen
        $ID_query = "select ID from account where Email = '$gebruiker'";
        $ID_resultaat = $conn->query($ID_query);
        if(isset($_POST['verzend'])){
            //form informatie naar variabelen
            $titel = $_POST['titel'];
            $text = $_POST['text'];

            $textLength = strlen($text);
            if($textLength > 1000){
                echo "Te veel karakters";
            }else{
                //Query naar variabelen
                $ID = $ID_resultaat->fetch_assoc();
                $IDImplode = implode($ID, ",");

                //Query om informatie in database te stoppen.
                $blog_query = "insert into blogTekst(titel, tekst, account_ID)
                values('$titel', '$text', '$IDImplode')";
                $blog_resultaat = $conn->query($blog_query);
                echo "Verzenden gelukt";
            }
        }
    ?>
</body>
</html>