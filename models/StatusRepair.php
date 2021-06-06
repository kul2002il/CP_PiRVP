<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statusRepair".
 *
 * @property int $id
 * @property string $name
 *
 * @property Repair[] $repairs
 */
class StatusRepair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statusRepair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['idStatus' => 'id']);
    }
}
