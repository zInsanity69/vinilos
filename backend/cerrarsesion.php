<?php

session_start();

session_unset(); //Destrulle todas las sesiones

header("Location: ./login.html");

?>