<?php
require_once "ConnectionHandler.php";

class ChangeCheck
{
    public function change()
    {
        //Diese Methode kontrolliert, ob die eingegebenen Daten, mit einem Login in der Datenbank übereinstimmt.

        if(!isset($_POST['resetbenutzername']) || !isset($_POST['oldpassword']) || !isset($_POST['newpassword']))
        {
            die("permission denied");
        }

         //Stellt Verbindung zur Datenbank her.
        $connection = ConnectionHandler::getConnection();
        if($connection->connect_error){
            echo "Verbindungsfehler: $connection->connect_error";
        }

        $connection->set_charset("utf8");

        //Dies ist die SQL Abfrage, die die eingegebenen Benutzerdaten und die bestehenden Benutzerdaten vergleicht.
        $query = "SELECT id, benutzername, password FROM user WHERE benutzername = ? AND password = ?";

        //htmlentities schützt vor jeglichen Angriffen.
        $benutzername = htmlentities($_POST ['resetbenutzername']);
        $password = htmlentities(sha1($_POST ['oldpassword']));


        $statement = $connection->prepare($query);
        // var_dump($statement);die;
        $statement->bind_param("ss", $benutzername, $password);
        $statement->execute();
        $result = $statement->get_result();

        //Wenn es in der Abfrage eine übereinstimmende Eingabe hat, wird man eingeloggt.
        if($result->num_rows == 1)
        {
          $query = "UPDATE user SET password = ? WHERE benutzername = ?";

          $password = htmlentities(sha1($_POST['newpassword']));

          $statement = $connection->prepare($query);

          $statement->bind_param("ss", $password, $benutzername);
          $statement->execute();
            return true;
        }
        else
        {
            return false;
        }
      }
    }


?>
