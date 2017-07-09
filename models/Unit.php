<?php
/**
 * Created by PhpStorm.
 * User: Rostislav
 * Date: 09.07.2017
 * Time: 13:56
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Unit extends Model
{
    public $name;
    public $full_name;
    const SCENARIO_SHOW = 'show';
    const SCENARIO_EDIT = 'edit';

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['full_name','name'],
            self::SCENARIO_SHOW => ['name'],
            self::SCENARIO_EDIT => ['name','full_name'],
        ];
    }

    public function rules()
    {
        //Локализация сообщений об ошибках с помощью параметра в конфиге - 'language' => 'ru-RU'
        return [
            [['name','full_name'],'required','on' => self::SCENARIO_EDIT],
            [['full_name'],'required','on' => self::SCENARIO_DEFAULT,'message'=>"Кастомное сообщение об ошибке «{attribute}»"],
            [['name'],'required','on' => self::SCENARIO_SHOW],

        ];
    }

    /**
     * Перевод меток атрибутов (т.е. их наименования для пользователя)
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'full_name' => 'Полное наименование',
        ];
    }

    /**
     * Этот массив аттрибутов собирается только при вызове Model::toArray()
     * @return array
     */
    public function fields()
    {
        return [
            'name',
            'desc'=> function(){
                return "Полное наименование - ".$this->full_name;
            },
            'fullName'=> 'full_name'
        ];
    }
}