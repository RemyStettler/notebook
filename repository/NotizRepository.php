<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class NotizRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'notizen';

    /**
     * Erstellt eine neue Notiz mit den gegebenen Werten.
     */
     public function insert($notiz)
     {
       session_start();
       $benutzername = $_SESSION['benutzername'];
       $query = "INSERT INTO $this->tableName (benutzername, notiz) VALUES (?, ?)";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('ss', $benutzername, $notiz);

       if (!$statement->execute())
       {
           throw new Exception($statement->error);
       }

       return $statement->insert_id;
     }

     public function select()
     {
       //$query = "SELECT notiz FROM $this->tableName WHERE benutzername = $_SESSION['benutzername']";

       $statement = ConnectionHandler::getConnection()->prepare($query);

       // id(!$statement->execute())
       // {
       //   throw new Exception($statement->error);
       // }
     }
}
