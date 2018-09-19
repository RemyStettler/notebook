<?php
require_once "ConnectionHandler.php";

class LoginCheck
{
    public function Login()
    {
        //Diese Methode kontrolliert, ob die eingegebenen Daten, mit einem Login in der Datenbank übereinstimmt.

        if(!isset($_POST['benutzername']) || !isset($_POST['password']))
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
        $query = "SELECT id, benutzername, password FROM user WHERE benutzername = ?";

        //htmlentities schützt vor jeglichen Angriffen.
        $benutzername = htmlentities($_POST ['benutzername']);

        $statement = $connection->prepare($query);
        $statement->bind_param("s", $benutzername);
        $statement->execute();
        $result = $statement->get_result();

        //Wenn es in der Abfrage eine übereinstimmende Eingabe hat, wird man eingeloggt.
        if($result->num_rows == 1)
        {
            session_start();
            $row = $result->fetch_object();
            if(!password_verify($_POST['password'], $row->password)) {
              return false;
            }

            $_SESSION['benutzername'] = $benutzername;
            $_SESSION['loggedin'] = true;
            return true;
        }
        else
        {
            return false;
        }
      }
    }


?>
