<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Neighbourhood[] $neighbourhoods
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNeighbourhoods()
    {
        return $this->hasMany(Neighbourhood::className(), ['id_state' => 'id']);
    }
}
