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
      $view = new View('uebersicht');
      $view->title = 'Übersicht';
      $view->heading = 'Übersicht';
      $view->display();
    }
  }

?>
