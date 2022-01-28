<main>

<div class="form_container">
        <h2 class="form_title">Forgot your password</h2>
        <form class="form" method="POST" action="">
            <section>

              
                <div class="form_field">
                    <label class="color--orange" for="email">Forgot your password:</label>
                    <input placeholder="e-mail"class="form_input" type="email" id="email" name="password">

                </div>

                <div class="form_field">
                    <input class="form_btn" type="submit" value="Submit" href="/?name=<?php echo $_COOKIE['user']  ?>">
                </div>
               
            </section>
        </form>
    </div>
</main>