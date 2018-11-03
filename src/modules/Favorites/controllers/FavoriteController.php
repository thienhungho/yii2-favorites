<?php

namespace thienhungho\Favorites\modules\Favorites\controllers;

use thienhungho\Favorites\modules\FavoriteBase\Favorite;
use yii\base\ErrorException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `CommentModule` module
 */
class FavoriteController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete'       => ['post'],
                    'create'       => ['post'],
                    'changeStatus' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @param $obj_type
     * @param $obj_id
     *
     * @return \yii\web\Response
     * @throws ErrorException
     */
    public function actionCreate($obj_type, $obj_id)
    {
        if (create_favorite($obj_type, $obj_id)) {
            return $this->goBack(request()->referrer);
        } else {
            throw new ErrorException(\Yii::t('app', "Can't create favorite"));
        }
    }

    /**
     * @param $obj_type
     * @param $obj_id
     *
     * @return \yii\web\Response
     * @throws ErrorException
     */
    public function actionDelete($obj_type, $obj_id)
    {
        if (delete_favorite($obj_type, $obj_id)) {
            return $this->goBack(request()->referrer);
        } else {
            throw new ErrorException(\Yii::t('app', "Can't delete favorite"));
        }
    }

    /**
     * @param $id
     *
     * @return Favorite|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Favorite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
