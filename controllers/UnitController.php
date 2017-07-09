<?php
/**
 * Created by PhpStorm.
 * User: Rostislav
 * Date: 09.07.2017
 * Time: 14:34
 */

namespace app\controllers;


use app\models\Unit;
use yii\web\Controller;

class UnitController extends Controller
{
    public function actionIndex()
    {
        $unit = new Unit();


        $unit->load($_POST);

        return $this->render('index',[
            'unit' => $unit
        ]);
    }
}