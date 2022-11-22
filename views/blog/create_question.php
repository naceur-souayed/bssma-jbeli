<div class="add_question">
 
  <form action="/biotouch/send_question/<?= $params['article']->id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $params['article']->id ?>">
    <textarea name="description" id="description" placeholder="détailler votre  question ici"></textarea>

    <input type="submit" class="mybtn" value="envoyer">

  </form>
</div>