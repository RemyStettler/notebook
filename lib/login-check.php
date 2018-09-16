<?php
require_once "ConnectionHandler.php";

class LoginCheck
{
    public function Login()
    {
        if(!isset($_POST['benutzername']) || !isset($_POST['password'])){
            die("permission denied");
        }

        $connection = ConnectionHandler::getConnection();
        if($connection->connect_error){
            echo "Verbindungsfehler: $connection->connect_error";
        }

        $connection->set_charset("utf8");
        $query = "SELECT benutzername, password FROM user WHERE benutzername = ? AND password = ?";
        +$benutzername = htmlspecialchars($_POST ['benutzername']);
        +$password = htmlspecialchars($_POST ['password']);

        $statement = $connection->prepare($query);
        $statement->bind_param("ss", $benutzername, $password);
        $statement->execute();
        $result = $statement->get_result();

        if($result->num_rows == 1){
            $row = $result->fetch_object();
            $_SESSION ['benutzername'] = $benutzername;
            $_SESSION ['loggedin'] = true;
            return true;
        }
        else{
            return false;
        }
    }
}

?>
