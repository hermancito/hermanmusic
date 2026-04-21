<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert-box alert" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    <?= $message ?>
</div>
