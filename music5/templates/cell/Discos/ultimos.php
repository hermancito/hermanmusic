<?php foreach ($ultimos as $u): ?>
    <div>
        <?= h($u->name) ?> - <?= h($u->banda) ?>
    </div>
<?php endforeach; ?>