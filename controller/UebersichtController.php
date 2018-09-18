<?php
require_once '../repository/NotizRepository.php';

  class UebersichtController
  {
    public function speichern()
    {
      session_start();
      $notiz = new NotizRepository();
      $notiz->insert($_POST['text']);
      $allenotizen = $notiz->readAll();
      $view = new View('uebersicht');
      $view->allenotizen = $allenotizen;
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }

    public function loeschen()
    {
      $notiz = new NotizRepository();
      $notiz->loeschen();
      $allenotizen = $notiz->readAll();
      //var_dump($allenotizen); exit;
      $view = new View('uebersicht');
      $view->allenotizen = $allenotizen;
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }
  }

?>
