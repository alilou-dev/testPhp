<?php
require_once __DIR__ . '/common/CommonComponents.php';
require_once __DIR__ . '/home/controller/GestionController.php';  
$formulaire = new GestionController(new DataBaseGestionRepository());
$formulaireView = $formulaire->viewFormulaireAction();
CommonComponents::render($formulaireView,true);