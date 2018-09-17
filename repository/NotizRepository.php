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

     public function showall()
     {
       session_start();
       $benutzername = $_SESSION['benutzername'];
       $query = "SELECT notiz FROM $this->tableName WHERE benutzername = ?";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('s', $benutzername);

       if(!$statement->execute())
       {
         throw new Exception($statement->error);
       }

       //var_dump($statement); exit;

       return $statement;

       // id(!$statement->execute())
       // {
       //   throw new Exception($statement->error);
       // }
     }

     public function loeschen()
     {
       session_start();
       $benutzername = $_SESSION['benutzername'];
       $query = "DELETE notiz FROM $this->tableName WHERE benutzername = ?";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('s', $benutzername);

       var_dump($statement); exit;

       if(!$statement->execute())
       {
         throw new Exception($statement->error);
       }

       return $statement->insert_id;
     }
}
