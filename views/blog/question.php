    <div id="question">
        <section class="title_question">
            <h2 class="question-title"><span class="question-num">Q</span> Toutes les questions</h2>
            <div>
                <h2>Trouvez la meilleure réponse à votre question technique,<span>aidez les autres à répondre aux leurs</span> </h2>
                <a href="/biotouch/create_question/<?= $params['article']->id ?>">poser votre question</a>
            </div>
        </section>
        <section class="list-q">


            <article class="question">
                <?php if (!empty($params['questions'])) : ?>
                    <?php foreach ($params['questions'] as $question) : ?>
                        <div class="question-content">
                            <p><?= $question->description ?></p>

                            <a href="/biotouch/single_question/<?= $question->id ?>">Afficher</a>

                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="question-content">
                        <p>aucune question</p>
                    </div>
                <?php endif; ?>

            </article>



        </section>

    </div>