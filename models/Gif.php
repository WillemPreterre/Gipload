<?php




require_once('Database.php');
require_once('./others/utils.php');

class Gif
{
    private int $gif_id;
    private string $gif_name;
    private int $gif_date;
    private string $gif_url;
    private int $gif_size;
    private int $gif_like;
    private int $gif_view;
    private int $gif_download;
    private int $category_id;
    private int $user_id;
    private PDO $db;

    // Créer l'objet
    public function __construct($gif_name, $gif_url, $gif_size, $user_id, $category_id)
    {
        $this->gif_name = $gif_name;
        // $this->gif_date = date('y.m.d');
        $this->gif_url = $gif_url;
        $this->gif_size = $gif_size;
        $this->gif_like = 0;
        $this->gif_view = 0;
        $this->gif_download = 0;
        $this->category_id = $category_id;
        $this->user_id = $user_id;


        $this->db = Database::connectDB();
    }


    public function addGif()
    {
        $sql = "INSERT INTO  Gif (gif_name, gif_date, gif_url, gif_size, gif_like, gif_view, gif_download, category_id, user_id)
        VALUES (?,?,?,?,?,?,?,?,?)";
        $sth = Database::connectDB()->prepare($sql)->execute([$this->gif_name, date('y.m.d'), $this->gif_url, $this->gif_size, $this->gif_like, $this->gif_view, $this->gif_download, $this->category_id, $this->user_id]);
        if ($sth == true) {
            echo "Gifs added successfully.";
        } else {
            echo "error";
        }

        return $sth;
    }

    public function getAllGifWithCategorieId($id)
    {
        $stmt = Database::connectDB()->prepare("SELECT * FROM Gif WHERE category_id = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetchAll();
        // pretty_print_r($details);
        return $details;
    }

    public function getAllGifWithUserId($id)
    {
        $stmt = Database::connectDB()->prepare("SELECT * FROM Gif WHERE user_id = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetchAll();
        // pretty_print_r($details);
        return $details;
    }



    //méthode pour montrer page gif
    public function getOneGif($id)
    {
        $stmt = Database::connectDB()->prepare("SELECT * FROM Gif WHERE gif_id = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetch();
        // pretty_print_r($details);
        return $details;
    }
    //méthode pour récupérer info des catégories
    public function getCategorie()
    {
        $stmt = Database::connectDB()->prepare("SELECT category_id,category_name FROM Category");
        $stmt->execute([]);
        $details = $stmt->fetchAll();
        // pretty_print_r($details);
        return $details;
    }


    // méthode pour évolution
    public function deleteGif($id)
    {
        $stmt = Database::connectDB()->prepare("DELETE FROM Gif WHERE gif_id = ?");
        $stmt->execute([$id]);
        $delete = $stmt->fetch();
        // pretty_print_r($delete);
        return $delete;
    }
    //méthode pour récup les tags
    public function getAllIdForGetTag($url)
    {
        $stmt = Database::connectDB()->prepare("SELECT gif_id FROM gif WHERE `gif_url` = ?");
        $stmt->execute([$url]);
        $details = $stmt->fetch();
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
