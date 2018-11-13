<?php

/**
 * @param $obj_type
 * @param $obj_id
 *
 * @return bool
 */
function is_user_created_favorite($obj_type, $obj_id)
{
    if (is_login()) {
        return \thienhungho\Favorites\models\Favorite::find()
            ->where(['obj_type' => $obj_type])
            ->andWhere(['obj_id' => $obj_id])
            ->andWhere(['created_by' => get_current_user_id()])
            ->exists();
    } else {
        return \thienhungho\Favorites\models\Favorite::find()
            ->where(['obj_type' => $obj_type])
            ->andWhere(['obj_id' => $obj_id])
            ->andWhere(['ip' => get_current_user_ip()])
            ->exists();
    }
}

/**
 * @param $obj_type
 * @param $obj_id
 *
 * @return bool
 */
function create_favorite($obj_type, $obj_id)
{
    $favorite = new \thienhungho\Favorites\models\Favorite([
        'obj_type' => $obj_type,
        'obj_id' => $obj_id,
        'ip' => get_current_user_ip(),
        'created_by' => get_current_user_id(),
    ]);
    if (is_login()) {
        if (is_user_created_favorite($obj_type, $obj_id)) {
            return true;
        } else {
            $favorite->created_by = get_current_user_id();
            return $favorite->save();
        }
    } else {
        if (is_user_created_favorite($obj_type, $obj_id)) {
            return true;
        } else {
            return $favorite->save();
        }
    }
}

/**
 * @param $obj_type
 * @param $obj_id
 *
 * @return bool
 */
function delete_favorite($obj_type, $obj_id)
{
    if (is_login()) {
        if (is_user_created_favorite($obj_type, $obj_id)) {
            return \thienhungho\Favorites\models\Favorite::deleteAll([
                'obj_type' => $obj_type,
                'obj_id' => $obj_id,
                'created_by' => get_current_user_id(),
            ]);
        } else {
            return true;
        }
    } else {
        if (is_user_created_favorite($obj_type, $obj_id)) {
            return \thienhungho\Favorites\models\Favorite::deleteAll([
                'obj_type' => $obj_type,
                'obj_id' => $obj_id,
                'ip' => get_current_user_ip(),
            ]);
        } else {
            return true;
        }
    }
}

/**
 * @param $obj_type
 * @param $obj_id
 *
 * @return int
 */
function delete_all_favorites($obj_type, $obj_id)
{
    return \thienhungho\Favorites\models\Favorite::deleteAll([
        'obj_type' => $obj_type,
        'obj_id' => $obj_id
    ]);
}

/**
 * @param $obj_type
 * @param $obj_id
 *
 * @return int|string
 */
function count_all_favorites($obj_type, $obj_id)
{
    return \thienhungho\Favorites\models\Favorite::find()
        ->where(['obj_type' => $obj_type])
        ->andWhere(['obj_id' => $obj_id])
        ->count();
}