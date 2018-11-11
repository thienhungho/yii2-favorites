<?php

namespace thienhungho\Favorites\modules\FavoriteBase\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "{{%favorites}}".
 *
 * @property integer $id
 * @property integer $obj_id
 * @property string $obj_type
 * @property string $ip
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Favorite extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['obj_id', 'obj_type', 'ip'], 'required'],
            [['obj_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['obj_type', 'ip'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%favorites}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'obj_id' => Yii::t('app', 'Obj ID'),
            'obj_type' => Yii::t('app', 'Obj Type'),
            'ip' => Yii::t('app', 'Ip'),
        ];
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \thienhungho\Favorites\modules\FavoriteBase\query\FavoriteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \thienhungho\Favorites\modules\FavoriteBase\query\FavoriteQuery(get_called_class());
    }
}
