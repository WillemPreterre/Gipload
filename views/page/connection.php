<main>

    <div class="form_container">
        <h2 class="form_title">Connection</h2>
        <form class="form" method="POST" action="">
            <section>

                <div class="form_field">
                    <label class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username">

                </div>
                <div class="form_field">
                    <label class="color--orange" for="password">Password:</label>
                    <input class="form_input" type="password" id="password" name="password">

                </div>

                <div class="form_field">
                    <input class="form_btn" type="submit" value="Submit" href="/?name=<?php echo $_COOKIE['user']  ?>">
                </div>
                <div class="form_link">
                    <a class="link_connect" rel="stylesheet" href="/?name=inscription">Register now</a>
                    <a class="link_connect" rel="stylesheet" href="../controllers/UserInscription.php">Forgot your password</a>

                </div>
            </section>
        </form>
    </div>


</main>