<section class="login-register">
    <div class="register">
        <div class=" background-image">
        </div>
        <div class="form">
            <div class="form-color"></div>
            <form action="/biotouch/register" method="POST">
                <div class=" ">
                    <input type="text" class="form-control " name="name" id="name" placeholder="Name">

                </div>

                <div>
                    <input type="email" class="form-control" name="email" id="adressmail" placeholder="Email address">

                </div>
                <div>
                    <input type="password" class="form-control" name="password" class="password" id="exampleInputPassword1" placeholder="Password">

                </div>
                <div>
                    <input type="tel" class="form-control" name="phone" id="tel" placeholder="Telephone">

                </div>
                <div>
                    <input type="text" class="form-control" name="adress" id="adress" placeholder="Adresse">

                </div>
                <input type="submit" class="btn_1 btn-register full-width" name="register" value="S'inscrire">
            </form>
            <span class="mt-5"><a href='/biotouch/login' class=' avez_compte'>Avez-vous un compte? </a>

            <div class="error">
                <?php if (isset($error)) : ?>

                    <p><?= $error ?> </p>

                <?php endif ?>
            </div>
        </div>
    </div>
</section>