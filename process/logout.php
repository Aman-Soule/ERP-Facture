<?php
session_start();
session_destroy(); // Détruit la session
header('Location: ../page/login.php');