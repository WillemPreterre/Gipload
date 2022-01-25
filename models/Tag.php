<?php
class Tag
{


    private int $tag_id;
    private string $tag_name;
    private PDO $db;

    // Hydratation
    public function __construct($tag_name)
    {
        $this->tag_name = $tag_name;

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
}
