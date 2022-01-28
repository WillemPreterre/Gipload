<main>

    <div class="form_container">
        <h2 class="form_title">Edit profile</h2>
        <form class="form" method="POST" action="../../controllers/userChangeUser.php">
            <section>
                <div class="form_field">
                    <label require class="color--green" for="username">Username:</label>
                    <input class="form_input" type="text" id="username" name="username" value="<?php echo $user_edit["user_name"]  ?> ">
                </div>
                <div class="form_field">
                    <input class="form_btn" type="submit" value="Edit">
                </div>

            </section>
        </form>
        <form class="form" method="POST" action="../../controllers/userChangePassword.php">
            <section>
                <div class="form_field ">
                    <label required class="color--pink" for="change_new_password">Change Password:</label>
                    <input class="form_input" type="password" id="change_new_password" name="change_new_password">
                    <!-- <div class="check_password">
                        <label for="show-Password1">Show password</label>
                        <input id="show-Password1" type="checkbox" onclick="hiddenPassword()">
                    </div> -->
                </div>
                <div class="form_field ">
                    <label required class="color--blue" for="change_last_password">Last Password:</label>
                    <input class="form_input" type="password" id="change_last_password" name="change_last_password">

                </div>

                <div class="form_field">
                    <input class="form_btn" type="submit" value="Edit">
                </div>

            </section>
        </form>
    </div>

</main>