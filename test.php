<?php
session_start();



if (session_status() == PHP_SESSION_NONE){
    echo "Bir session yok.";
}
else{
    echo "Bir session var.";
}

?>