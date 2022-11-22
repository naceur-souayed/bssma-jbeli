<form class="create" action="/biotouch/admin/posts/create" method="POST" enctype="multipart/form-data">
    <h1>creer un article </h1>
    <input type="hidden" name='id' id="id">
    <input type="text" name='title' id="title" placeholder="titre de l'article">
    <input type="text" name='price' id="price" placeholder="price de l'article">
    <input type="text" name='reference' id="reference" placeholder="reference de l'article">
    <input type="file" name="image">
    <div>
        <label for="content"> </label>
        <textarea name="content" id="content" class="form-control" placeholder="contenu de l'article"></textarea>
    </div>
    <div>
        <select id="category" class="form-control" name="category[]">
            <?php foreach ($params['categories'] as $category) : ?>

                <option value="<?= $category->id ?>"> <?= $category->category ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <input class="valider" type="submit" class="btn border" value="valider">

</form>