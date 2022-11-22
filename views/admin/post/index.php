<section class="admin-post">
    <h1>Administration des articles</h1>
    <span class="post_create"><a href="/biotouch//admin/posts/create">create article</a></span>
    <span class="post_create"><a href="/biotouch//admin/categories">categories</a></span>

    <?php if (isset($_GET['success'])) : ?>
        <div class="message_admin">
            Vous etes connecté!
        </div>
    <?php endif ?>
    <div class="message_admin">
    </div>

    <table class="table table_post">
        <thead>
            <tr>
                <th>id</th>
                <th>reference</th>
                <th>title</th>
                <!-- <th>content</th> -->
                <th>image</th>
                <th>created_at</th>
                <th>modifier</th>
                <th>supprimer</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['posts'] as $post) : ?>
                <tr>
                    <td><?= $post->id; ?></td>
                    <td><?= $post->reference; ?></td>
                    <td><?= $post->title; ?></td>
                    <!-- <td><= $post->content; ?></td> -->
                    <td><img type="file" name="image" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . $post->image ?>" alt="product"></td>
                    <td><?= $post->getCreatedAt(); ?></td>


                    <td class="modifier"><a href="/biotouch/admin/posts/edit/<?= $post->id; ?>">modifier</a></td>


                    <form action="/biotouch/admin/posts/delete/<?= $post->id; ?>" method="POST">

                        <td class="supprimer"><input type="submit" value="supprimer"></td>
                    </form>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</section>