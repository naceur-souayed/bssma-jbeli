<div>

    <h1>la parfaite qualité de nos produits!</h1>
    <section>
        <article id="offre">
            <video class="fullscreen-bg-video" controls loop muted autoplay poster="Rustypic.jpg" s>
                <source src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR  . 'video.mp4' ?>" type="video/mp4">

            </video>
            <p>Pour toute commande effectuée avant le premier Septembre</p>

        </article>
        <article class=" article-slider">
            <div id="flexslider">
                <ul class="slider">
                    <li class=" slider_img1 item-slider show"></li>
                    <li class=" slider_img2 item-slider hide"></li>
                </ul>
            </div>
            <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'icon_next.png' ?>" class="commun fas fa-chevron-right" alt="offre1">
            <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'right.png' ?>" class="commun fas fa-chevron-left" alt="offre2">


        </article>

        <article id="our_product">
            <h2>Choisissez votre produits</h2>
            <?php foreach ($params['categories'] as $category) : ?>
                <div><img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR  . $category->image ?>" alt="nos_produit">
                    <h3><?= $category->category ?></h3>
                </div>
            <?php endforeach ?>

        </article>

    </section>
    <section class="new_product">
        <?php foreach ($params['articles'] as $produit) : ?>
            <article class="product_pro">
                <div>
                    <h2>Notre nouveauté</h2>
                    <img name="file" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . $produit->image ?>" alt="nouveau_produit">
                    <h3><?= $produit->title ?></h3>
                    <p><?= $produit->getExcerpt() ?></p>
                </div>
                <strong>partir de <span id="prix"><?= $produit->price ?></span>DT</strong>
                <a href="/biotouch/detail/<?= $produit->id ?>"> VOIR CE PRODUIT</a>
            </article>
        <?php endforeach ?>
    </section>

</div>