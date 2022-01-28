<main>

    <div class="form_container">
        <h2 class="form_title">Register</h2>
        <form class="form" method="POST">
            <section>
                <div class="form_field">
                    <label require class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username">
                    <?php echo $username_message ?>
                </div>
                <div class="form_field">
                    <label class="color--orange" for="email">E-mail:</label>
                    <input class="form_input" type="email" id="email" name="email">
                    <?php echo $email_message ?>
                </div>
                <div class="form_field">
                    <label class="color--blue" for="password">Password: <i onclick="popUp" class="fas fa-exclamation-triangle">
                            <span class="popuptext" id="myPopup">8 characters,1 uppercase, 1 lowercase, 1 number</span></i>
                    </label>
                    <input class="form_input" type="password" id="password" name="password">
                    <?php
                    echo $password_message ?>
                </div>
                <div class="form_field">
                    <label class="color--pink" for="validate_password">Validate Password:</label>
                    <input class="form_input" type="password" id="validate_password" name="validate_password">
                </div>
                <div class="form_checkbox ">
                    <input type="checkbox" class="checkboxCreateAccount" id="checkboxCreateAccount" name="privacy">
                    <label for="checkboxCreateAccount">i read and accept The <a href="?page=confidentialite">Termes of Services</a> </label>
                </div>
                <div class="form_field">
                    <input class="form_btn submitCreateAccount" disabled class="form_btn" type="submit" value="Submit">

                </div>
                <div class="form_link"> <a class="link_connect" rel="stylesheet" href="/?page=connection">Se connecter</a></div>


            </section>
        </form>
    </div>

</main>