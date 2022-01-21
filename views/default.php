<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="../sass/help.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/998854ecdc.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>

</head>


<?php 
if ($_COOKIE['name'] == null || !isset($_COOKIE)) :  ?>
<?php pretty_print_r($_COOKIE); ?>

    <header class="color--black">
        <nav>
            <h1 class="nav_title"><a href="../index.php">Gipload</a></h1>
            <div class="nav_link">
                <a class="BgColor--blue" rel="stylesheet" href="../controllers/UserInscription.php">Register</a>
                <a class="BgColor--blue" href="">Sign in</a>
                <a id="btnMenu" rel="stylesheet" href="">About</a>
            </div>
        </nav>
        <!-- <div class="deroulant">
            <a href="">Contact us</a>
            <a href="">Privacy</a>
            <a href="">How to upload a GIF</a>
            <a href="">How to download a GIF</a>
        </div> -->
    </header>
    <?php else : ?>

    <header class="color--black">
        <nav>
            <h1 class="nav_title"><a href="../index.php">Gipload</a></h1>
            <div class="nav_link">
                <a class="BgColor--orange" href="">About</a>
                <a class="BgColor--purple" rel="stylesheet" href="UserEdit.php?name=<?php echo $_COOKIE['name']?>">Upload</a>
                <i role="button" class="fas fa-user"></i>

            </div>

        </nav>
        <!-- <div class="deroulant">
            <a href="">Profile</a>
            <a href="" >Log out</a>
        </div> -->
    </header>
<?php endif; ?>

<body>
    <main>
        <?= $content ?>
    </main>
</body>

</html>