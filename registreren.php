<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registreren</title>
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
        ?>
    </head>
    <body>
        <form action="registreren.php" method="post" enctype="multipart/form-data">
            <br>
            <input required type="text" name="naam" placeholder="Naam" />
            <br>
            <input required type="email" name="e-mail" placeholder="E-mail" />
            <br>
            <input required type="password" name="password" placeholder="Wachtwoord" />
            <p>Upload je foto</p>
            <input required type="file" name="foto" id="foto" /> 
            <br><br>
            <input type="submit" name="submit" value="Registreren" />
            <a href="inloggen.php">
                <input type="button" name="annuleren" value="Annuleren">
            </a>
        </form>
        <?php
            if(isset($_POST['submit'])){
                
                //Email query
                $emailreg_query = 'select Email from account';
                $emailreg_resultaat = $conn->query($emailreg_query);
                //Wachtwoord query
                $wachtwoordreg_query = 'select Wachtwoord from account';
                $wachtwoordreg_resultaat = $conn->query($wachtwoordreg_query);
                //gebruikersnaam query
                $naam_query = 'select Naam from account';
                $naam_resultaat = $conn->query($naam_query);
                //Array voor checken naam
                if($naam_resultaat->num_rows > 0){
                    while($fila = $naam_resultaat->fetch_assoc()){
                    $restricciones[] = $fila['Naam'];
                    }
                }
                //Array voor checken e-mail
                if($emailreg_resultaat->num_rows > 0){
                    while($reihe = $emailreg_resultaat->fetch_assoc()){
                    $beschrankungen[] = $reihe['Email'];
                    }
                }
                //Array voor checken wachtwoord
                if($wachtwoordreg_resultaat->num_rows > 0){
                    while($ry = $wachtwoordreg_resultaat->fetch_assoc()){
                    $beperkings[] = $ry['Wachtwoord'];
                    }
                }
                //Verplaats foto van temp-map naar uploadsMap
                        
                        $uploadsMap = "uploads/";
                        $uploadsMap = $uploadsMap . basename($_FILES['foto']['name']);
                        $fotoType = pathinfo($uploadsMap, PATHINFO_EXTENSION);
                        //Opslaan in database
                        $naam = htmlspecialchars($_POST['naam']);
                        $email = htmlspecialchars($_POST['e-mail']);
                        $wachtwoord = htmlspecialchars($_POST['password']);
                        $fotoNaam = basename($_FILES['foto']['name']);

                        if(file_exists($uploadsMap)){
                            echo "Deze foto bestaat al.";
                        }elseif(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadsMap)){
                            for($q = 0; $q < count($restricciones); $q++){
                                //Controleert of de naam al bestaat
                                if($naam == $restricciones[$q]){
                                    echo "Deze naam is al in gebruik";
                                    break;
                                //Controleert of de email al bestaat
                                }elseif($email == $beschrankungen[$q]){
                                    echo "Deze e-mail is al in gebruik";
                                    break;
                                //Controleert of de wachtwoord al bestaat
                                }elseif($wachtwoord == $beperkings[$q]){
                                    echo "Deze wachtwoord is al in gebruik";
                                    break;
                                //controleert of de foto al bestaat
                                //Valideer fotoSize
                                }elseif($_FILES['foto']['size'] > 50000){
                                    echo "Deze foto is te groot.";
                                    break;
                                //Valideer formaat
                                }elseif($fotoType != "jpg" &&
                                    $fotoType != "png" &&
                                    $fotoType != "jpeg" &&
                                    $fotoType != "gif"){
                                    echo "Foto moet jpg, jpeg, png of gif zijn";
                                    break;
                                }else{
                                    echo "Foto is geupload";
                                }
                            }
                            if($q == count($restricciones)){
                                $insert_query = "insert into account(Naam, Email, Wachtwoord, foto)
                                values('$naam', '$email', '$wachtwoord', '$fotoNaam')";
                                $insert_resultaat = $conn->query($insert_query);
                                echo "Account is aangemaakt";
                            }
                        }else{
                            echo "Probleem bij het uploaden. Foto niet geupload.";
                        }
                        
                        
                        
                    }
        ?>
        <a href="registreren.php"><input type="button" name="terug" value="Terug " />
    </body>
</html>