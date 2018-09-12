<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        // Anfrage an die URI /user/crate weiterleiten (HTTP 302)
        header('Location: /user/create');
    }

    public function create()
    {
        $view = new View('login_form');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
}
