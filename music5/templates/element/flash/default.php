<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert-box" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    <?= $message ?>
</div>
