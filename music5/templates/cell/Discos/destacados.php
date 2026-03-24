<?php foreach ($destacados as $d): ?>
    <div>
        <?= h($d->name) ?> - <?= h($d->banda) ?>
    </div>
<?php endforeach; ?>