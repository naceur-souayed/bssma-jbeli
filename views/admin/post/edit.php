<form class="modifier" action="/biotouch/admin/posts/edit/<?= $params['post']->id ?>" method="POST" enctype="multipart/form-data">
    <h1>modifier un article </h1>
    <input type="hidden" name="id" value="$params['post']->id?>">
    <label for="title"> titre de l'article</label>
    <input type="text" name='title' id="title" value="<?= $params['post']->title ?>">
    <label for="title"> reference</label>
    <input type="text" name='reference' id="reference" value="<?= $params['post']->reference ?>">
    <label for="title"> price</label>
    <input type="text" name='price' id="price" value="<?= $params['post']->price ?>">
    <label for="title"> image de l'article</label>
    <input type="file" name="image" value="<?= $params['post']->image ?> ?>">
    <div>
        <label for="content"> contenu de l'article</label>
        <textarea name="content" id="content" class="form-control"><?= $params['post']->content ?></textarea>
    </div>
    <div>
        <label for="category"> category</label>

        <select id="category" class="form-control" name="category[]">
            <?php foreach ($params['categories'] as $category) : ?>
                <option value="<?= $category->id ?>" <?php foreach ($params['post']->getTages() as $post_catg) {
                                                            echo ($category->id === $post_catg->id) ? 'selected' : '';
                                                        } ?>>
                    <?= $category->category ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <input type="submit" class="btn border valider" value="valider">

</form>