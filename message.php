<?php
    if(isset($_SESSION['message'])) :
?>

<div class="alerta" role="alert">
    <strong><?= $_SESSION['message']?></strong>
    <button class="btn-acao" aria-label="close"></button>
</div>

<?php
    unset($_SESSION['message']);
    endif;
?>