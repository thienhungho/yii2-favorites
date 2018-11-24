<?php

namespace thienhungho\Favorites\modules\FavoriteBase\query;

/**
 * This is the ActiveQuery class for [[Favorite]].
 *
 * @see Favorite
 */
class FavoriteQuery extends \thienhungho\ActiveQuery\models\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Favorite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Favorite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
