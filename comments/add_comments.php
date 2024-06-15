<h1>Ajouter des commentaires</h1>
<form action="./../comments/post_comment.php" method="POST" class="mb-5">
    
    <?php if (isset($_SESSION['COMMENT'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['COMMENT'];
            unset ($_SESSION['COMMENT']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['NO_COMMENT'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['NO_COMMENT'];
            unset ($_SESSION['NO_COMMENT']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['COMMENT_ERR'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['COMMENT_ERR'];
            unset ($_SESSION['COMMENT_ERR']); ?>
        </div>
    <?php endif; ?>

    <div class="mb-3 visually-hidden">
        <input class="form-control" type="text" name="recipe_id" value="<?php echo($recipe['recipe_id']); ?>">
    </div>
    
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea class="form-control" name="comment" id="comment" placeholder="Veuillez rester respectueux et constructif."></textarea>
    </div>

    <div class="mb-3">
        <label for="review" class="form-label">Notez la recette</label>
        <input type="number" class="form-control" value="3" name="review" min="0" max="5">
    </div>

    <button type="submit" name="send" class="btn btn-primary">Envoyer</button>
</form>