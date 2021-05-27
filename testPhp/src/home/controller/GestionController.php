<?php
require_once __DIR__ . '/../view/buildViewEtudiant.php';
require_once __DIR__ . '/../view/buildForm.php';
require_once __DIR__ . '/../model/DataBaseGestionRepository.php';

class GestionController
{
  private $gestionRepository;

  public function __construct(DataBaseGestionRepository $gestionRepository)
  {
    $this->gestionRepository = $gestionRepository;
  }

  public function viewEtudiantAction(): string
  {
    $etudiants = $this->gestionRepository->getAllEtudiants();
    return buildViewEtudiant($etudiants);
  }

  public function viewFormulaireAction(): string
  {
    if (!isset($_GET['id'])) {
      print_r("fghj");
      

      $this->redirectToHomePage();
    }

    $matieres = $this->gestionRepository->getAllMatieres();
    $error = '';
    $values = [
      'note_analyse' => '',
      'note_bdd' => '',
      'note_anglais' => '',
      'note_programmation' => '',
      'ID' => ''
    ];
    $values['ID'] = htmlspecialchars($_GET['id']);


    if ($this->isFormFilled()) {
      if ($this->isOneOfTheFieldsMissing()) {
        $values['note_analyse'] = htmlspecialchars($_POST['note_analyse_1']);
        $values['note_bdd'] = htmlspecialchars($_POST['note_bdd_2']);
        $values['note_anglais'] = htmlspecialchars($_POST['note_anglais_3']);
        $values['note_programmation'] = htmlspecialchars($_POST['note_programmation_4']);
        $error = 'Veuillez remplir toutes les notes';
      } else if ($this->isValidNote() === false) {
        $values['note_analyse'] = htmlspecialchars($_POST['note_analyse_1']);
        $values['note_bdd'] = htmlspecialchars($_POST['note_bdd_2']);
        $values['note_anglais'] = htmlspecialchars($_POST['note_anglais_3']);
        $values['note_programmation'] = htmlspecialchars($_POST['note_programmation_4']);
        $error = 'Veillez entrer une note comprise entre 0 et 20 ';
      } else {
        $note_analyse = htmlspecialchars($_POST['note_analyse_1']);
        $note_bdd = htmlspecialchars($_POST['note_bdd_2']);
        $note_anglais = htmlspecialchars($_POST['note_anglais_3']);
        $note_programmation = htmlspecialchars($_POST['note_programmation_4']);
        $notes = [
          1 => $note_analyse,
          2 => $note_bdd,
          3 => $note_anglais,
          4 => $note_programmation
        ];
        $id_etudiant = htmlspecialchars($values['ID']);
        $this->gestionRepository->createEvaluation($notes, $id_etudiant);
        $this->redirectToHomePage();
      }
    }



    return buildForm($matieres, $values, $error);
  }

  function isFormFilled(): bool
  {
    return isset($_POST['note_analyse_1'], $_POST['note_bdd_2'], $_POST['note_programmation_4'], $_POST['note_anglais_3']);
  }

  private function isOneOfTheFieldsMissing(): bool
  {
    return (isset($_POST['note_analyse_1']) && $_POST['note_analyse_1'] === '')
      || (isset($_POST['note_bdd_2']) && $_POST['note_bdd_2'] === '')
      || (isset($_POST['note_programmation_4']) && $_POST['note_programmation_4'] === '')
      || (isset($_POST['note_anglais_3']) && $_POST['note_anglais_3'] === '');
  }

  private function isValidNote(): bool
  {
    return ($_POST['note_analyse_1'] >= 0 && $_POST['note_analyse_1'] <= 20)
      &&  ($_POST['note_bdd_2'] >= 0 && $_POST['note_bdd_2'] <= 20)
      &&  ($_POST['note_programmation_4'] >= 0 && $_POST['note_programmation_4'] <= 20)
      &&  ($_POST['note_anglais_3'] >= 0 && $_POST['note_anglais_3'] <= 20);
  }

  private function redirectToHomePage()
  {
    //header('Location: ../../src/user/login.php');
    header("Location: {__DIR__}/../index.php");
  }
}
