<section>
  <h1>Administration des categories</h1>
  <span class="category_create"><a href="/biotouch/admin/categories/create">create category</a></span>
  <span class="post_create"><a href="/biotouch/admin/posts">Articles</a></span>

  <div class="message_admin">
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>category</th>
        <th>image</th>
        <th>modifier</th>
        <th>supprimer</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($params['categories'] as $category) : ?>

        <tr>
          <td><?= $category->id; ?></td>
          <td><?= $category->category; ?></td>
          <td><img type="file" name="image" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . $category->image ?>" alt="categories"></td>

          <td class="modifier"><a href="/biotouch/admin/categories/edit/<?= $category->id; ?>">modifier</a></td>
          <form action="/biotouch/admin/categories/delete/<?= $category->id; ?>" method="POST">
            <td class="supprimer supp_category"><input type="submit" value="supprimer"></td>
          </form>

        </tr>
      <?php endforeach ?>


    </tbody>
  </table>
</section>