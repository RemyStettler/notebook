<?php
require_once '../repository/NotizRepository.php';

  class UebersichtController
  {
    public function index()
    {
      //Leitet die Seite wieder zur aktualisierten Übersicht.
      $notiz = new NotizRepository();
      $allenotizen = $notiz->readAll();
      $view = new View('uebersicht');
      $view->allenotizen = $allenotizen;
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }

    public function speichern()
    {
      session_start();
      $notiz = new NotizRepository();
      $notiz->insert(htmlspecialchars($_POST['text'])); //Führt die Speicherung der Datensätze durch.

      header('Location: /uebersicht');
    }

    public function loeschen()
    {
      $notiz = new NotizRepository();
      $notiz->loeschen(); //Führt das Löschen der Datensätze durch.

      //Leitet die Seite wieder zur aktualisierten Übersicht.
      header('Location: /uebersicht');
    }
  }

?>
