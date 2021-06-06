<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apparatus".
 *
 * @property int $id
 * @property int $idModel
 *
 * @property Model $idModel0
 * @property Repair[] $repairs
 */
class Apparatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apparatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idModel'], 'required'],
            [['idModel'], 'integer'],
            [['idModel'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['idModel' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idModel' => 'Id Model',
        ];
    }

    /**
     * Gets query for [[IdModel0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdModel0()
    {
        return $this->hasOne(Model::className(), ['id' => 'idModel']);
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['idApparatus' => 'id']);
    }
}
