
<?php
// require_once('../others/utils.php');
require_once('./models/User.php');
require_once('./models/Gif.php');
require_once('./models/Tag.php');
require_once('./models/Sanitize.php');
require_once('./models/Link.php');

class Controller
{
    //méthode pour inscrire l'user
    public function inscription()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Extract all the name in the form can use it to take the data from form
            extract($_POST);
            // Get all the post name and put it on a var
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validate_password = $_POST["validate_password"];

            //Sanitize
            $sanitize_email = Sanitize::email($email);
            $sanitize_username = Sanitize::text($username);
            $sanitize_password = Sanitize::text($password);

            //Patern pour trier et message d'erreur
            $uppercase = "AZERTYUIOPQSDFGHJKLMWXCVBN";
            $lowercase = "azertyuiopqsdfghjklmwxcvbn";
            $number = "1234567890";
            $password_hash = password_hash($sanitize_password, PASSWORD_BCRYPT);

            //Condition Password  + email + username + si les deux mdp match ensemble
            if (filter_var($sanitize_email, FILTER_VALIDATE_EMAIL) == true) {
                if (isset($sanitize_email, $sanitize_username) && strlen($sanitize_username) >= 3) {
                    if (!empty($password)) {
                        switch ($password) {
                            case strpbrk($password, $uppercase) == NULL:
                                $password_message = "Need one UpperCase";
                                break;
                            case strpbrk($password, $number) == NULL:
                                $password_message = "Need one number";
                                break;
                            case strpbrk($password, $lowercase) == false:
                                $password_message = "Need one LowerCase";
                                break;
                            case strlen($password) <= 7:
                                $password_message = "Need 8 Characters";
                                break;

                            case $password != $validate_password:
                                $password_message = "Different password";
                                break;

                            default:
                                $inscription = new User(0, $username, $sanitize_email, $password_hash);
                                $inscription->inscription();
                                Link::redirectTo("/?page=connection");

                                break;
                        }
                    } else {
                        $password_message = "No password ";
                    }
                } else {
                    $username_message = "username trop court";
                }
            } else {
                $email_message = "this email is not a valid email address";
            }
        }

        $title = 'Inscription';
        // permet d'envoyer un message d'erreur en dessous du champs 
        if (empty($password_message)) {
            $password_message = "";
        }
        if (empty($username_message)) {
            $username_message = "";
        }
        if (empty($email_message)) {
            $email_message = "";
        }
        render('page/inscription', compact('title', 'password_message', 'username_message', 'email_message'));

        // Sanitize de l'espace
        // Checkbox
        //doublon
    }


    // méthode pour donner les infos de l'user sur la page edit
    public function edit($id)
    {

        $edit = new User(0, '', '', '');
        $user_edit = $edit->getInformation($id);

        // pretty_print_r($user_edit);

        $title = 'Your profile';

        render('page/user_edit', compact('title', 'user_edit'));

        // Fonctionnalité Désactivation du compte
    }

    //méthode pour connecter l'user
    public function connection()
    {

        if (!isset($_COOKIE)) {
            setcookie("name", null, time() + (86400 * 90), "/"); // 86400 = 1 day 

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            extract($_POST);

            //récupération des post name du form de connection
            $user_post = $_POST['username'];
            $password_post = $_POST['password'];

            //Sanitize des champs
            $sanitaze_username = Sanitize::text($user_post);
            $sanitaze_password = Sanitize::text($password_post);

            if (
                isset($user_post, $password_post)
            ) {
                // Condition pour connection
                if (
                    isset($sanitaze_username)  && isset($sanitaze_password)
                ) {

                    //initialisation des variables pour les cookies
                    $connection = new User(0, '', '', '');
                    $user_name_verif = $connection->connection($sanitaze_username);
                    // condition pour vérif si erreur dans les champs et pour set le cookie
                    if (!empty($password) && password_verify($password_post, $user_name_verif['user_password'])) {
                        setcookie("name", $user_name_verif['user_id'], time() + (86400 * 90), "/"); // 86400 = 1 day 

                        Link::redirectTo("/?page=home");
                    } else {
                        echo ('id or password incorrect');
                    }
                } else {
                    echo 'Remplir les champs';
                }
            }
        }

        $title = 'Connection';


        if (empty($password_message)) {
            $name_message = "";
        }

        render('page/Connection', compact('title'));
        // render('default', compact('cookie_name','cookie_value'));

        // Enlevé le msg quand mauvais 
    }

    //méthode pour déconnecter le user
    public function deconnection()
    {

        setcookie("name", '', time() - 700, '/');

        Link::redirectTo("/?page=home");
    }

    // méthode pour appeller les gifs d'une personne dans la page user_gifs
    public function usergifs($id)
    {


        // Get all gif from the user
        $gif = new Gif('', '', 0, 0, 0);
        $user_gifs = $gif->getAllGifWithUserId($id);

        //get information from the user
        $user = new User(0, '', '', '');
        $user_title = $user->getInformation($id);


        $title = 'Your GIF';
        // on envoie dans html pour boucler les gifs 
        render('page/user_gifs', compact('title', 'user_title', 'user_gifs'));
    }

    //méthode qui va upload le gif
    public function gifupload()
    {
        //on récupère les valeurs get du form de gifupload
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            extract($_POST);

            $categorie_post = $_POST["form_gifCategorie"];

            $categorie = new Gif("", "", 0, 0, $categorie_post);
            $categorie->getCategorie();
        }
        $title = ('Gif upload');
            // récupère toutes les catégories pour boucler dans le html

        $categorie = new Gif("", "", 0, 0, 0);
        $categorieSelectAll = $categorie->getCategorie();
        render('page/upload_gif', compact('title', 'categorieSelectAll'));
    }
    //méthode qui va permettre de faire le lien
    public function gifuploading()
    {
        render('page/gif_traitement');
    }




    //méthode pour récupérer
    public function gifinfo($id)
    {
        // Appelle objet
        $info_gif = new Gif("", "", 0, 0, 0);
        $info_user = new User(0, "", "", "");
        $tag_info = new Tag('', 0, 0);

        //récupérer l'id du gif + nom
        $allInformationGif = $info_gif->getOneGif($id);
        $user_name = $info_user->getInformation($allInformationGif['user_id']);

        // Gif
        $user_gifs = $info_gif->getAllGifWithUserId($allInformationGif['category_id']);
        // pretty_print_r($user_gifs);
        $tag_get = $tag_info->getTag($id);

        // pretty_print_r($tag_get);

        foreach ($tag_get as $tag) {

            $TagName = $tag_info->getTagName($tag['tag_id']);

            $tagAllTag = $TagName[0]['tag_name'];

            $tag_info->getTagName($tag['tag_id']);
        }

        // Gif similaire
        $edit = new Gif('', '', 0, 0, 0);
        $user_gifs = $edit->getAllGifWithCategorieId($id);

        $title = 'Your profile';

        render('/page/gif_info', compact('title', 'allInformationGif', 'user_gifs', 'tag_get', 'tag_info', 'user_name'));
    }


//méthode pour afficher le home
    public function home()
    {
        // categorie for page
        $title = 'Gif page';
        $categorie = new Gif("", "", 0, 0, 0);
        $categorieSelectAll = $categorie->getCategorie();



        render('page/index', compact('title', 'categorieSelectAll'));
    }
    //méthode pour la page de confidentialité
    public function confidentialite()
    {
        // categorie for page
        $title = 'Thermes of services';


        render('page/confidentialite', compact('title'));
    }
        //méthode pour la page de contact

    public function contact()
    {
        // categorie for page
        $title = 'Contact';


        render('page/contact', compact('title'));
    }
        //méthode pour la page de mot de passe oublié

    public function misspassword()
    {
        // categorie for page
        $title = 'password';


        render('page/misspassword', compact('title'));
    }
        //méthode pour la page après la recherche

    public function search($id)
    {


        // Get all gif from the user
        $gif = new Gif('', '', 0, 0, 0);
        $user_gifs = $gif->getAllGifWithCategorieId($id);

        // //get information from the user
        // $edit = new User(0, '', '', '');
        // $user_edit = $edit->getInformation($id);


        $title = 'Search';


        render('page/search', compact('title',  'user_gifs'));
    }
}
