<?php

namespace thienhungho\Favorites\modules\FavoriteBase;

use Yii;
use \thienhungho\Favorites\modules\FavoriteBase\base\Favorite as BaseFavorite;

/**
 * This is the model class for table "favorites".
 */
class Favorite extends BaseFavorite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['obj_id', 'obj_type', 'ip'], 'required'],
            [['obj_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['obj_type', 'ip'], 'string', 'max' => 255],
        ]);
    }
	
}
