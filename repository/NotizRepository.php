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
       //Diese Methode fügt einen neuen Datensatz in die Tabelle, wo die Notizen gespeichert sind.
       if(!isset($_SESSION)){
         session_start();
       }
       $benutzername = $_SESSION['benutzername'];

       //Dies ist das SQL Statement, dass den neuen Datensatz anlegen wird.
       $query = "INSERT INTO $this->tableName (benutzername, notiz) VALUES (?, ?)";

       //Stellt Verbindung zur Datenbank her.
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
           //Diese Methode nimmt alle notizen aus der Datenbank, die dem entsprechenden Benutzer gehören.
           if(!isset($_SESSION)){
             session_start();
           }

            $benutzername = $_SESSION['benutzername'];
            //Dies ist das SQL Statement, dass die Datensätze aus der Datenbank lesen.
            $query = "SELECT id, notiz FROM $this->tableName WHERE benutzername = ?";

             //Stellt Verbindung zur Datenbank her.
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('s', $benutzername);
            $statement->execute();
            $result = $statement->get_result();
            if (!$result) {
               throw new Exception($statement->error);
            }
            // Datensätze aus dem Resultat holen und in das Array $rows speichern.
            $rows = array();
            while ($row = $result->fetch_object()) {
               $rows[] = $row;
            }
            return $rows;
         }

     public function loeschen()
     {
       //Diese Methode löscht alle Datensätze, die von dem entsprechenden Benutzer eingetragen wurden.
       session_start();
       $benutzername = $_SESSION['benutzername'];

       //Dies ist das SQL Statement, dass die Datensätze aus der Datenbank löscht.
       $query = "DELETE FROM $this->tableName WHERE benutzername = ?";

        //Stellt Verbindung zur Datenbank her.
       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('s', $benutzername);

       if(!$statement->execute())
       {
         throw new Exception($statement->error);
       }

       return $statement->insert_id;
     }
}
