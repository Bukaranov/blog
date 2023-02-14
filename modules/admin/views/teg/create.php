<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teg $model */

$this->title = 'Create Teg';
$this->params['breadcrumbs'][] = ['label' => 'Tegs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
