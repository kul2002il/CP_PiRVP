<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property int|null $idMaster
 * @property int $idApparatus
 * @property int $idStatus
 * @property string $brekage
 * @property string $description
 * @property string|null $feedback
 * @property string $startRepair
 * @property string|null $endRepair
 *
 * @property User $idMaster0
 * @property Apparatus $idApparatus0
 * @property StatusRepair $idStatus0
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMaster', 'idApparatus', 'idStatus'], 'integer'],
            [['idApparatus', 'idStatus', 'brekage', 'description'], 'required'],
            [['description', 'feedback'], 'string'],
            [['startRepair', 'endRepair'], 'safe'],
            [['brekage'], 'string', 'max' => 200],
            [['idMaster'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idMaster' => 'id']],
            [['idApparatus'], 'exist', 'skipOnError' => true, 'targetClass' => Apparatus::className(), 'targetAttribute' => ['idApparatus' => 'id']],
            [['idStatus'], 'exist', 'skipOnError' => true, 'targetClass' => StatusRepair::className(), 'targetAttribute' => ['idStatus' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idMaster' => 'Id Мастера',
            'idApparatus' => 'Id Аппарата',
            'idStatus' => 'Id Статуса',
            'brekage' => 'Заголовок поломки',
            'description' => 'Описание поломки',
            'feedback' => 'Отзыв',
            'startRepair' => 'Время и дата с подачи заявки',
            'endRepair' => 'Время и дата конца ремонта',
        ];
    }

    /**
     * Gets query for [[IdMaster0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaster0()
    {
        return $this->hasOne(User::className(), ['id' => 'idMaster']);
    }

    /**
     * Gets query for [[IdApparatus0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdApparatus0()
    {
        return $this->hasOne(Apparatus::className(), ['id' => 'idApparatus']);
    }

    /**
     * Gets query for [[IdStatus0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdStatus0()
    {
        return $this->hasOne(StatusRepair::className(), ['id' => 'idStatus']);
    }
}
