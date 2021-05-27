<?php
function buildForm($matieres,$values,$error): string {
    $tableSaisieNote = matieresTable($matieres,$values);
    $errorAlert = '';
  if ($error !== '') {
    $errorAlert = "<div class=\"alert alert-danger mb-3\">$error</div>";
  }
  
    return <<<HTML
    $errorAlert

    $tableSaisieNote

HTML;
}
function matieresTable($matieres, $values){
    $form = '';
    $form .= <<<HTML
        <form  class="insert-form" id="insert-form" action="" method="post">
        <table class="table table-bordered">

        <h2>Formulaire de Saisie de Notes</h2>

            <tr>
                <th>Matière</th>
                <th>Coefficient</th>
                <th>Note</th>
            </tr>
HTML;
    foreach($matieres as $matiere){
        $value = $values["note_{$matiere->nom}"];
        $form .= <<<HTML
                <tr>
                    <td>$matiere->nom</td>
                    <td>$matiere->coefficient</td>
                    <td>
                      <input type="number" 
                        name="note_{$matiere->nom}_{$matiere->ID}" 
                        placeholder="Entrez une note" 
                        id="note_{$matiere->nom}" 
                        value="{$value}"
                        required>
                    </td>
                </tr>     
HTML;
    
    }
    $form .= <<<HTML
        </table>
        <button name = "envoyer" type="submit" class="btn btn-dark">Envoyer</button>
    </form>

HTML;
    
    return $form;
}

    

