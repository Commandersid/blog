<?php
    //Vind de sessie
    session_start();
    //Eind sessie melden
    echo "Tot ziens " . $_SESSION['USER'];
    //Verwijder de sessie
    session_destroy();
?>