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
?>

    <header class="color--black">
        <nav class="nav">
            <h1 class="nav_title"><a href="?page=home">Gipload</a></h1>
            <div class="nav_link">
                <a class="BgColor--blue" rel="stylesheet" href="?page=inscription">Register</a>
                <a class="BgColor--blue" href="?page=connection">Sign in</a>
                <a id="btn_about" class="BgColor--orange">About</a>
            </div>

            <div class="deroulantAbout">
                <a class="BgColor--pink" href="?page=contact">Contact us</a>
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
            <h1 class="nav_title"><a href="?page=home">Gipload</a></h1>
            <div class="nav_link">
                <a id="btn_about" class="BgColor--orange">About</a>
                <a class="BgColor--purple" rel="stylesheet" href="?page=gifupload">Upload</a>
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
                <a class="BgColor--orange" href="?page=edit/<?php echo $_COOKIE['name'] ?>">Profile</a>
                <a class="BgColor--blue" href="?page=usergifs/<?php echo $_COOKIE['name'] ?>">Your Gif's</a>
                <a class="BgColor--pink" href="?page=deconnection">Log out</a>
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