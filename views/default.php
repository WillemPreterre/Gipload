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

<header class="color--black">
    <nav>
        <h1 class="nav_title" ><a href="../index.php">Gipload</a></h1>
        <div class="nav_link">
            <a rel="stylesheet" href="../controllers/UserInscription.php">Register</a>
            <a class="btn_pink" href="">Sign in</a>
            <a rel="stylesheet" href="">About</a>
        </div>
    </nav>
</header>
<body>
    <main>  
  <?=  $content ?>
    </main>
</body>
</html>