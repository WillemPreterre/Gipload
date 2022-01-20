<main>

    <div class="form">
        <h2 class="form_title">Inscription</h2>
        <form class="form_champ" method="POST">
            <section>
                <div class="form_field">
                    <label require class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username">
                </div>
                <div class="form_field">
                    <label class="color--orange" for="email">E-mail:</label>
                    <input class="form_input" type="email" id="email" name="email">
                </div>
                <div class="form_field">
                    <label class="color--blue" for="password">Password:</label>
                    <input class="form_input" type="password" id="password" name="password">
                </div>
                <div class="form_field">
                    <label class="color--pink" for="validate_password">Validate Password:</label>
                    <input class="form_input" type="password" id="validate_password" name="validate_password">
                </div>
                <div class="form_checkbox ">
                    <input type="checkbox" id="privacy" name="privacy">
                    <label for="privacy">i read and accept The <a href="">Termes of Services</a> </label>
                </div>
                <div class="form_field">
                    <input class="form_btn" type="submit" value="Submit">

                </div>
                <div class="form_link"> <a class="link_connect" rel="stylesheet" href="../controllers/userConnection.php">Se connecter</a></div>


            </section>
        </form>
    </div>

</main>