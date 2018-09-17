<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
require_once '../lib/login-check.php';

class UserController
{
    public function index()
    {
        // Anfrage an die URI /user/crate weiterleiten (HTTP 302)
        header('Location: /user/create');
    }

    public function create()
    {
        $view = new View('default_index');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function anmelden()
    {
      $check = new LoginCheck();
      if($check->Login()){
          $view = new View('uebersicht');
          $view->title = 'Übersicht';
          $view->heading = 'Übersicht';
          $view->display();
      }
      else{
        die ("nicht ok");
      }
    }
}
