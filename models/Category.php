<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id']);
    }

    public function getArticlesCount()
    {
        return $this->getArticles()->count();
    }

    public static function getAll()
    {
        return Category::find()->all();
    }

    public static function getArticlesByCategory($id)
    {
        $query = Article::find()->where(['category_id' => $id]);
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }
}
