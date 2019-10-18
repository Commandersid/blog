<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inloggen</title>
        <style>
            body{font-family: Verdana; 
                font-size: 10px;}
            form{border: 0.5px solid black;
                text-align: center;
                width: 80%;
                padding-bottom: 20px;}
        </style>
        <?php
            include('connectie.php');
            //Email query
            $email_query = 'select Email from account';
            $email_resultaat = $conn->query($email_query);
            //Wachtwoord query
            $wachtwoord_query = 'select Wachtwoord from account';
            $wachtwoord_resultaat = $conn->query($wachtwoord_query);
        ?>
    </head>
    <body>
        <form name="inloggen" method="post" enctype="multipart/form-data" action="inloggen.php">
            <p>Inloggen</p>
            <input required type="text" name="e-mail" placeholder="E-mail" />
            <br>
            <input required type="password" name="password" placeholder="Wachtwoord" />
            <br><br>
            <input type="submit" name="inloggen" value="inloggen" />
            <br>Nog geen account? <br>
            <a href="registreren.php">
                <input type="button" name="registreren" value="Registreren" />
            </a>
        </form>
        <?php
            if(isset($_POST['inloggen'])){
                //Array voor checken e-mail
                if($email_resultaat->num_rows > 0){
                    while($row = $email_resultaat->fetch_assoc()){
                    $restricties[] = $row['Email'];
                    }
                }else{
                    echo "Geen accounts aangemaakt";
                }
                //Array voor checken password
                if($wachtwoord_resultaat->num_rows > 0){
                    while($rij = $wachtwoord_resultaat->fetch_assoc()){
                    $restrictions[] = $rij['Wachtwoord'];
                    }
                }else{
                    echo "Geen accounts aangemaakt";
                }
                $email = $_POST['e-mail'];
                $wachtwoord = $_POST['password'];
                $bestand = fopen("gebruikers.txt", "r");
                if(!$bestand){
                    echo "Kon geen bestand openen!";
                }
                while(!feof($bestand)){
                    for($z = 0; $z < count($restricties); $z++){
                        if($email == $restricties[$z] && $wachtwoord == $restrictions[$z]){
                            session_start();
                            $_SESSION['USER'] = $email;
                            $_SESSION['STATUS'] = 1;
                            $_SESSION['ID'] = $_COOKIE['PHPSESSID'];
                            header("Location: welkom.php");
                            break;
                        }elseif($z == count($restricties)){
                            echo "E-mail of Wachtwoord is niet correct";
                            break;
                        }
                    }
                }
            }
        ?>
    </body>
</html>