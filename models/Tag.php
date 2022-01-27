<?php
class Tag
{


    private int $tag_id;
    private int $gif_id;
    private string $tag_name;
    private PDO $db;

    // Hydratation
    public function __construct($tag_name, $gif_id, $tag_id)
    {
        $this->tag_name = $tag_name;
        $this->gif_id = $gif_id;
        $this->tag_id = $tag_id;

        $this->db = Database::connectDB();
    }

    public function addTag()
    {
        $sql = "INSERT INTO  Tag (tag_name)
        VALUES (?)";
        $sth = Database::connectDB()->prepare($sql)->execute([$this->tag_name]);
        if ($sth == true) {
            echo "Tags added successfully.";
        } else {
            echo "Tag error";
        }
        return $sth;
    }

    public function verifTag($id)
    {
        $stmt = Database::connectDB()->prepare("SELECT * FROM Tag WHERE tag_name = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetch();
        // pretty_print_r($details);
        return $details;
    }

    public function addTagInGetTag()
    {
        $sql = "INSERT INTO  Get_tag_for_gif (gif_id,tag_id)
        VALUES (?,?)";
        $sth = Database::connectDB()->prepare($sql)->execute([$this->gif_id, $this->tag_id]);
        if ($sth == true) {
            echo "Tags added successfully in gettag.";
        } else {
            echo "Tag error";
        }
        return $sth;
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
