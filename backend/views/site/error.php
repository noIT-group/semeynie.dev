<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Данная страница не существует';

?>
<div class="site-error" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; max-width: 860px; margin: 0 auto;">

    <h1>Данная страница не существует</h1>
    <br>
    <div class="alert alert-danger" style="margin: 0 auto; width: 100%; box-sizing: border-box; max-width: 490px;">
        <strong>Внимание!</strong>
        <?= nl2br(Html::encode($message)) ?>
    </div>

</div>
