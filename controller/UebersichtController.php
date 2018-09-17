<?php
require_once '../repository/NotizRepository.php';

  class UebersichtController
  {
    public function speichern()
    {
      //session_start();
      $notiz = new NotizRepository();
      //var_dump($_SESSION['benutzername']); exit;
      $notiz->insert($_POST['text']);
      //$allenotizen = $notiz->showall();
      $view = new View('uebersicht');
      //$view->allenotizen = $allenotizen;
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }

    public function loeschen()
    {
      $notiz = new NotizRepository();
      $notiz->loeschen();
      $view = new View('uebersicht');
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }
  }

?>
