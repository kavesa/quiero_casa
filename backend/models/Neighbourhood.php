<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "neighbourhood".
 *
 * @property integer $id
 * @property integer $id_state
 * @property string $name
 */
class Neighbourhood extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'neighbourhood';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_state', 'name'], 'required'],
            [['id_state'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_state' => 'Id State',
            'name' => 'Name',
        ];
    }
}
