<section class="singl_qustion">
    <article class="question-full">
        <div>
            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar1" />
        </div>
        <div class="question-content">
            <p><?= $params['questions']->description; ?></p>
        </div>
    </article>

    <article class="body_comment">

        <div class="box_comment">

            <form action="/biotouch/reponse/<?= $params['questions']->id; ?>" method="POST">
                <input type="hidden" name="question_id" value="<?= $params['questions']->id; ?>">

                <textarea name="comment" class="commentar" placeholder="Ajouter un commentaire..."></textarea>

                <input type="submit" name="commenter" class="mybtn" value="comment">

            </form>

        </div>
        <div>
            <ul id="list_comment">

                <?php foreach ($params['reponses'] as $reponse) : ?>
                    <li>
                        <div class="avatar_comment col-md-1">
                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar2" />
                        </div>
                        <div class="result_comment col-md-11">
                            <h4><?= $params['users']->name; ?></h4>

                            <p><?= $reponse->reponse; ?></p>

                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </article>

</section>