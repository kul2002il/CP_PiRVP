<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property int $idType
 * @property int $idBrand
 * @property string $name
 *
 * @property Apparatus[] $apparatuses
 * @property TypeApparatus $idType0
 * @property Brand $idBrand0
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idType', 'idBrand', 'name'], 'required'],
            [['idType', 'idBrand'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['idType'], 'exist', 'skipOnError' => true, 'targetClass' => TypeApparatus::className(), 'targetAttribute' => ['idType' => 'id']],
            [['idBrand'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['idBrand' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idType' => 'Id Типа',
            'idBrand' => 'Id Производителя',
            'name' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[Apparatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApparatuses()
    {
        return $this->hasMany(Apparatus::className(), ['idModel' => 'id']);
    }

    /**
     * Gets query for [[IdType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdType0()
    {
        return $this->hasOne(TypeApparatus::className(), ['id' => 'idType']);
    }

    /**
     * Gets query for [[IdBrand0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBrand0()
    {
        return $this->hasOne(Brand::className(), ['id' => 'idBrand']);
    }
}
