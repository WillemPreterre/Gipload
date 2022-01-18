<?php
require_once('Database.php');
require_once('../others/utils.php');

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
        // Prepare si il y a un ? query sinon query pas besoin de  execute
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
    // $cookie_name,$cookie_value
    public function connection() {
        // setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
        $stmt = $this->db->query("SELECT user_name,user_password FROM User");
        pretty_print_r($stmt);
        $users = $stmt->fetchAll();
        return $this->$users;
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
