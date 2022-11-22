<form class="modifier" action="/biotouch/admin/categories/edit/<?= $params['categories']->id ?>" method="POST" enctype="multipart/form-data">
    <h1>modifier un category </h1>
    <label for="category"> category </label>
    <input type="text" name='category' id="category" value="<?= $params['categories']->category ?>">
    <label for="title"> image de la categorie</label>
    <input type="file" name="image" class="w-100" value="<?= $params['categories']->image ?>">
    <input type="submit" class="btn border valider" value="valider">

</form>