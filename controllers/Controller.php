
<?php
// require_once('../others/utils.php');
require_once('./models/User.php');
require_once('./models/Gif.php');
require_once('./models/Sanitize.php');
require_once('./models/Link.php');

class Controller
{

    public function inscription()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Extract all the name in the form can use it to take the data from form
            extract($_POST);
            // print_r($_POST);
            // Get all the data and put it on a var
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validate_password = $_POST["validate_password"];
            //Sanitize
            $sanitize_email = Sanitize::email($email);
            $sanitize_username = Sanitize::text($username);
            $sanitize_password = Sanitize::text($password);
            pretty_print_r($password);
            //Patern pour trier et message d'erreur
            $uppercase = "AZERTYUIOPQSDFGHJKLMWXCVBN";
            $lowercase = "azertyuiopqsdfghjklmwxcvbn";
            $number = "1234567890";
            $password_hash = password_hash($sanitize_password, PASSWORD_BCRYPT);

            //Condition Password  + email + username

            if (filter_var($sanitize_email, FILTER_VALIDATE_EMAIL) == true) {
                if (isset($sanitize_email, $sanitize_username) && strlen($sanitize_username) >= 3) {
                    if (!empty($password))  {
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

                            case $password != $validate_password :
                                $password_message = "Different password";
                                break;
 
                            default:
                                $inscription = new User(0, $username, $sanitize_email, $password_hash);
                                $inscription->inscription();
                                Link::redirectTo("/?name=connection");

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

        // Aa1aza2aa
        $title = 'Inscription';

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

    public function usergifs($id)
    {


        // Get all gif from the user
        $edit = new Gif('', '', 0, 0, 0);
        $user_gifs = $edit->getAllGifFromUser($id);

        //get information from the user
        $edit = new User(0, '', '', '');
        $user_edit = $edit->getInformation($id);


        $title = 'Your GIF';

        render('/page/user_gifs', compact('title', 'user_edit', 'user_gifs'));
    }

    public function edit($id)
    {

        $edit = new User(0, '', '', '');
        $user_edit = $edit->getInformation($id);

        pretty_print_r($user_edit);

        $title = 'Your profile';

        render('/page/user_edit', compact('title', 'user_edit'));

        // Fonctionnalité Désactivation du compte
    }


    public function connection()
    {

        if (!isset($_COOKIE)) {
            setcookie("name", null, time() + (86400 * 90), "/"); // 86400 = 1 day 

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            extract($_POST);
            $user_post = $_POST['username'];
            $password_post = $_POST['password'];

            //Sanitize
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
                    if (password_verify($password_post, $user_name_verif['user_password'])) {
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

    public function deconnection() {
        
    setcookie("name", '', time() -700, '/');

    Link::redirectTo("/?page=home");
    
    }
}
