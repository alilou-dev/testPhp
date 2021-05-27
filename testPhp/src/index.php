<?php
require_once __DIR__ . '/common/CommonComponents.php';
require_once __DIR__ . '/home/controller/GestionController.php'; 
$etudiants = new GestionController(new DataBaseGestionRepository());
$etudiantsView = $etudiants->viewEtudiantAction();
CommonComponents::render($etudiantsView,true);
