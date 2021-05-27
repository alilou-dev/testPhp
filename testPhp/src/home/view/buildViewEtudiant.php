<?php
function buildViewEtudiant($etudiants): string {
  $etudiantsCards = etudiantCards($etudiants);
  
  return <<<HTML
    <div class="row">
    $etudiantsCards
    </div>
HTML;
}

function etudiantCards($etudiants) {
  $cards = '';
  foreach($etudiants as $etudiant) {
    $isNoted = empty($etudiant->moyenne);
    $noteActionButton = '';
    if($isNoted){
      $noteActionButton = "<a href='/testPhp/src/formulaire.php?id={$etudiant->ID}' class='btn btn-primary'>notez</a>";
    }else 
    $noteActionButton =  "<small> <strong> déjà noté </strong></small>";
    
    $cards .= <<<HTML
    <div class="col-sm-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{$etudiant->nom}</h4>
          <h4 class="card-title">{$etudiant->prenom}</h4>
          <small> <strong> moyenne générale </strong> : {$etudiant->moyenne} <br></small>
          <small>  Année : {$etudiant->annee}</small>
          <p class="card-text"></p>
          {$noteActionButton}
        </div>
      </div>
    </div>
HTML;
  }
  return $cards;

}