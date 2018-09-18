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
       if(!isset($_SESSION)){
         session_start();
       }
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

     public function readAll()
         {
           if(!isset($_SESSION)){
             session_start();
           }

            $benutzername = $_SESSION['benutzername'];
            $query = "SELECT notiz FROM $this->tableName WHERE benutzername = ?";
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('s', $benutzername);
            $statement->execute();
            $result = $statement->get_result();
            if (!$result) {
               throw new Exception($statement->error);
            }
            // Datensätze aus dem Resultat holen und in das Array $rows speichern
            $rows = array();
            while ($row = $result->fetch_object()) {
               $rows[] = $row;
            }
            return $rows;
         }

     public function loeschen()
     {
       session_start();
       $benutzername = $_SESSION['benutzername'];
       $query = "DELETE FROM $this->tableName WHERE benutzername = ?";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('s', $benutzername);

       //var_dump($statement); exit;

       if(!$statement->execute())
       {
         throw new Exception($statement->error);
       }

       return $statement->insert_id;
     }
}
