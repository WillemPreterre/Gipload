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
        pretty_print_r($sth);
        if ($sth == true) {
            echo "Records added successfully.";
        } else {
            echo "error";
        }

        return $sth;
    }


    // [queryString] => INSERT INTO User ('user_name','user_email','user_password','user_createdate' ,'user_editdate')
    // VALUES ('aaa','admin.admin@gmail.com','aaa',date('m.d.y'),date('m.d.y'));

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function __get($property)
    {
        $this->$property;
    }
}
