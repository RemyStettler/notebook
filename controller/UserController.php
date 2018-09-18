<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
require_once '../lib/login-check.php';
require_once '../repository/NotizRepository.php';

class UserController
{
    public function index()
    {
        // Anfrage an die URI /user/crate weiterleiten (HTTP 302)
        header('Location: /user/create');
    }

    public function create()
    {
        $view = new View('default_index'); //Weiterleitung auf die Homeseite.
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function anmelden()
    {
      //In dieser Methode wird der Benutzer angemeldet. Je nach dem, ob er gültige oder ungültige eingaben eingegeben hat.
      $check = new LoginCheck();
      if($check->Login())
      {
        $notizrep = new NotizRepository();
        $allenotizen = $notizrep->readAll();
        $view = new View('uebersicht');  //Nach dem erfolgreichen anmelden, wird der Benutzer zu der Übersicht von seinen Persönlich erstellten Notizen weitergeleitet.
        $view->allenotizen = $allenotizen;
        $view->title = 'Übersicht';
        $view->heading = 'Übersicht';
        $view->display();
      }
      else{
        header('Location: /user/create?error=1');
      }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /'); //Nach dem erfolgreichen abmelden, wird der Benutzer zu der Startseite weitergeleitet.
    }

    public function impressum()
    {
      //Weiterleitung zum Impressum.
      $view = new View('impressum');
      $view->title = 'Impressum';
      $view->heading = 'Impressum';
      $view->display();
    }
}
