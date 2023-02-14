<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teg".
 *
 * @property int $id
 * @property string|null $title
 */
class Teg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teg';
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
        return $this->hasMany(Article::class, ['id' => 'article_id'])
            ->viaTable('article_tag', ['tag_id' => 'id']);
    }
}
