<main>

    <div class="form">
        <h2 class="form_title">Upload Gif</h2>
        <form class="form_champ" method="POST" enctype="multipart/form-data"
         action="../../controllers/gif_traitement.php"
         >
            <label class="color--pink"> Find GIF and download here for all !</label>
            <section>
                <div class="form_field">
                    <label require class="color--green" for="gif_upload">Upload Gif here</label>
                    <input class="form_input" type="file" id="gif_upload" name="gif_upload">
                </div>

                <div class="form_field">
                    <label class="color--orange" for="form_gifName">Name :</label>
                    <input class="form_input" type="text" id="form_gifName" name="form_gifName">
                </div>

                <div class="form_field">
                    <label class="color--green" for="form_gifTag">Tag :</label>
                    <input class="form_input" type="text" id="form_gifTag" name="form_gifTag">
                </div>

                <div class="form_field">
                    <label class="color--blue" for="form_gifCategorie">Categorie :</label>
                    <select name="form_gifCategorie" id="form_gifCategorie">
                        <option value="">--Please choose an categorie--</option>
                        <?php
                        pretty_print_r($categorieSelectAll);
                        foreach ($categorieSelectAll as $categorieUnique) : ?>
                            <option value="<?php echo $categorieUnique["category_id"] ?>"><?php echo $categorieUnique["category_name"] ?></option>


                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form_field">
                    <input class="form_btn" type="submit" value="Create" name="gif_submit">
                </div>

            </section>
        </form>
    </div>

</main>