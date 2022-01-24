<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="../sass/help.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/998854ecdc.js" crossorigin="anonymous"></script>


</head>


<?php
if ($_COOKIE['name'] == null || !isset($_COOKIE)) :  ?>
    <?php
    // pretty_print_r($_COOKIE['name']);
    ?>

    <header class="color--black">
        <nav class="nav">
            <h1 class="nav_title"><a href="userGif.php?name=<?php echo $_COOKIE['name'] ?>">Gipload</a></h1>
            <div class="nav_link">
                <a class="BgColor--blue" rel="stylesheet" href="../controllers/UserInscription.php">Register</a>
                <a class="BgColor--blue" href="../controllers/UserConnection.php">Sign in</a>
                <a id="btn_about" class="BgColor--orange">About</a>
            </div>

            <div class="deroulantAbout">
                <a class="BgColor--pink" href="#">Contact us</a>
                <a class="BgColor--purple" href="#">Privacy</a>
                <a class="BgColor--orange" href="#">How to upload a GIF</a>
                <a class="BgColor--orange" href="#">How to download a GIF</a>
                <div class="activeAbout"></div>
            </div>
        </nav>

    </header>
<?php else : ?>

    <header class="color--black">
        <nav class="nav">
            <h1 class="nav_title"><a href="userGif.php?name=<?php echo $_COOKIE['name'] ?>">Gipload</a></h1>
            <div class="nav_link">
                <a id="btn_about" class="BgColor--orange">About</a>
                <a class="BgColor--purple" rel="stylesheet" href="Gifupload.php">Upload</a>
                <i id="btn_profile" role="button" class="fas fa-user"></i>
            </div>

            <div class="deroulantAbout">
            <a class="BgColor--pink" href="#">Contact us</a>
                <a class="BgColor--purple" href="#">Privacy</a>
                <a class="BgColor--orange" href="#">How to upload a GIF</a>
                <a class="BgColor--orange" href="#">How to download a GIF</a>

                <div class="activeAbout"></div>
            </div>

            <div class="deroulantProfile">
                <a class="BgColor--orange" href="UserEdit.php?name=<?php echo $_COOKIE['name'] ?>">Profile</a>
                <a class="BgColor--blue" href="userGif.php">Your Gif's</a>
                <a class="BgColor--pink" href="">Log out</a>
                <div class="activeProfile"></div>
            </div>
        </nav>

    </header>
<?php endif; ?>

<body>
    <main>
        <?= $content ?>
    </main>
    <script src="../assets/js/script.js"></script>

</body>

</html>