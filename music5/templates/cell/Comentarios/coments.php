<?php foreach ($comentarios as $comentario): ?>
    <article>
        <div class="large-12 columns">
            <p><b><?= h($comentario['user']['name']) ?></b></p>
            <p><?= h($comentario['coment']) ?></p>
            <p><small><?= h($comentario['created']) ?></small></p>
        </div>
    </article>
    <hr>
<?php endforeach; ?>