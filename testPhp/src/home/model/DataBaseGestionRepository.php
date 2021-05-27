<?php

require_once __DIR__ . '/../../common/DataBaseClient.php';

class DataBaseGestionRepository
{
  private $database;

  public function __construct()
  {
    $this->database = DatabaseClient::getDatabase();
  }

  public function getAllEtudiants()
  {
    $request = $this->database->prepare('SELECT * FROM etudiant');
    $request->execute();
    $etudiants = $request->fetchAll(PDO::FETCH_OBJ);
    foreach ($etudiants as $etudiant) {
      $notes = $this->getNotesByEtudiant($etudiant->ID);
      if (empty($notes)) {
        $etudiant->moyenne = '';
      } else {
        $etudiant->moyenne = $this->computeMoyenne($notes);
      }
    }
    
    return $etudiants;
  }

  public function getAllMatieres()
  {
    $request = $this->database->prepare('SELECT * FROM matiere');
    $request->execute();
    $matieres = $request->fetchAll(PDO::FETCH_OBJ);
    return $matieres;
  }

  public function createEvaluation($notes, $id_etudiant): void
  {
    foreach ($notes as $idMatiere => $note) {
      $this->createNotes($id_etudiant, $idMatiere, $note);
    }
  }

  private function computeMoyenne($notes)
  {
    $sommeCoef = 0;
    $sommeNotes = 0;
    foreach ($notes as $note) {
      $sommeCoef += $note->coefficient;
      $sommeNotes += $note->valeur * $note->coefficient;
    }
    return $sommeNotes / $sommeCoef;
  }

  private function getNotesByEtudiant($etudiantId)
  {
    $request = $this->database->prepare('SELECT n.valeur, m.coefficient FROM note n inner join matiere m on n.id_matiere = m.ID where n.id_etudiant = :id_etudiant');
    $request->execute([
      'id_etudiant' => $etudiantId
    ]);
    $notes = $request->fetchAll(PDO::FETCH_OBJ);
    return $notes;
  }

  private function createNotes($id_etudiant, $id_matiere, $note): void
  {
    $request = $this->database->prepare('INSERT INTO note(id_etudiant, id_matiere, valeur) VALUES (:id_etudiant, :id_matiere, :note)');
    $request->execute([
      'id_etudiant' => $id_etudiant,
      'id_matiere' => $id_matiere,
      'note' => $note
    ]);
  }
}
