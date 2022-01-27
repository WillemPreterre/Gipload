<?php
require_once('Database.php');
require_once('./others/utils.php');

class User
{

    private PDO $db;
    private int $id;
    private string $email;
    private int $createdate;
    private string $password;
    private string $username;
    // Créer l'objet
    public function __construct($id, $username, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->createdate = 0;
        $this->password = $password;
        $this->username = $username;
        $this->db = Database::connectDB();
    }

    // public function getAllUser()
    // {
    //     $sth = Database::connectDB()->prepare("SELECT * FROM User");
    //     $sth->execute();

    //     $result = $sth->fetchAll();
    //     return $result;
    // }

    public function inscription()
    {
        $sql = "INSERT INTO  User (user_name,user_email,user_password,user_createdate ,user_editdate)
        VALUES (?,?,?,?,?)";
        $sth = Database::connectDB()->prepare($sql)->execute([$this->username, $this->email, $this->password, date('y.m.d'), date('y.m.d')]);
        if ($sth == true) {
            echo "Records added successfully.";
        } else {
            echo "error";
        }

        return $sth;
    }


    // Prepare si il y a un ? query sinon query pas besoin de  execute

    public function connection($username)
    {
        // setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
        $stmt = Database::connectDB()->prepare("SELECT * FROM User WHERE user_name= ?");
        $stmt->execute([$username]);
        $users = $stmt->fetch();
        // pretty_print_r($users);
        return $users;
    }


    public function getInformation($id)
    {
        $stmt = Database::connectDB()->prepare("SELECT * FROM User WHERE user_id = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetch();
        // pretty_print_r($details);
        return $details;
    }


    public function modifyUsername($newName, $id)
    {
        $stmt = Database::connectDB()->prepare("UPDATE User SET user_name = ? WHERE user_id= ?");
        $stmt->execute([$newName ,$id]);
        $details = $stmt->fetch();
        // pretty_print_r($details);
        return $details;
    }



    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function __get($property)
    {
        $this->$property;
    }
}
