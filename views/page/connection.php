<main>

    <div class="form">
        <h2 class="form_title">Connection</h2>
        <form class="form_champ" method="POST" action="">
            <section>

                <div class="form_field">
                    <label class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username">
                    <?php
                    // echo $errorChamp 
                    ?>
                </div>
                <div class="form_field">
                    <label class="color--orange" for="password">Password:</label>
                    <input class="form_input" type="password" id="password" name="password">
                    <?php
                    // echo $errorChamp 
                    ?>
                </div>

                <div class="form_field">
                    <input class="form_btn" type="submit" value="Submit" href="user_edit.php?user_id=<?php echo $_COOKIE['user']  ?>">
                </div>
                <div class="form_link">
                    <a class="link_connect" rel="stylesheet" href="../controllers/UserInscription.php">Register now</a>
                    <a class="link_connect" rel="stylesheet" href="../controllers/UserInscription.php">Forgot your password</a>

                </div>
            </section>
        </form>
    </div>


</main>