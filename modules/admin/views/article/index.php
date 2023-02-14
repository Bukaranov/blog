<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'content:ntext',
            'date',
//            [
//                'attribute' => 'userName',
//                'value' => 'user.name',
//            ],
//            'user.name',
//            [
//                'label' => 'User name 3',
//                'value' => function ($model) {
//                    return $model->user->name . ($model->user->isAdmin ? ' (admin)' : ' (customer)');
//                },
//            ],
            [
                'format' => 'html',
                'label' => 'image',
                'value' => function($date)
                {
                    return Html::img($date->getImage(), ['width'=>150]);
                }
            ],
            //'image',
            //'viewed',
            //'user_id',
            //'status',
            //'category_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
