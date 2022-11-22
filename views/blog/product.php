<?php foreach ($params['categories'] as $category) : ?>

    <section class="product_all" id="category<?php $category->id ?>">
        <article class="list_category">
            <!-- <img src="<= SCRIPTS . 'img' . DIRECTORY_SEPARATOR .$category->image?>" alt="notre_product"> -->
            <h2><?= $category->category ?></h2>
        </article>
        <?php foreach ($params['articles'] as $produit) : ?>
            <?php if ($produit->Id_category == $category->id) : ?>
                <article class="list_product">
                    <h3><?= $produit->title ?></h3>
                    <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . $produit->image ?>" alt="products">
                    <strong>A partir de <span id="prix"><?= $produit->price ?></span>DT</strong>
                    <a href="/biotouch/detail/<?= $produit->id ?>">VOIR CE PRODUIT</a>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>

    </section>
<?php endforeach; ?>