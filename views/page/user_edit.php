<main>

    <div class="form_container">
        <h2 class="form_title">Edit profile</h2>
        <form class="form" method="POST">
            <section>
                <div class="form_field">
                    <label require class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username" value="<?php echo $user_edit["user_name"]  ?> ">
                </div>
                <div class="form_field">
                    <label class="color--orange" for="email">E-mail:</label>
                    <input class="form_input" value="<?php echo $user_edit["user_email"] ?>" type="email" id="email" name="email">

                </div>
                <div class="form_field ">
                    <label class="color--pink" for="change_password">Change Password:</label>
                    <input class="form_input" type="password" id="change_password" name="change_password">
                    <div class="check_password">
                        <label for="show-Password1">Show password</label>
                        <input id="show-Password1" type="checkbox" onclick="hiddenPassword()">
                    </div>
                </div>


                <div class="form_field">
                    <input class="form_btn" type="submit" value="Edit">
                </div>

            </section>
        </form>
    </div>

</main>