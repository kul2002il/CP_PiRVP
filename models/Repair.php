<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property int|null $idMaster
 * @property int $idClient
 * @property int $idApparatus
 * @property int $idStatus
 * @property string $brekage
 * @property string $description
 * @property string|null $feedback
 * @property string $startRepair
 * @property string|null $endRepair
 *
 * @property User $idMaster0
 * @property User $idClient0
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
            [['idMaster', 'idClient', 'idApparatus', 'idStatus'], 'integer'],
            [['idClient', 'idApparatus', 'idStatus', 'brekage', 'description'], 'required'],
            [['description', 'feedback'], 'string'],
            [['startRepair', 'endRepair'], 'safe'],
            [['brekage'], 'string', 'max' => 200],
            [['idMaster'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idMaster' => 'id']],
            [['idClient'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idClient' => 'id']],
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
            'idMaster' => 'Id Master',
            'idClient' => 'Id Client',
            'idApparatus' => 'Id Apparatus',
            'idStatus' => 'Id Status',
            'brekage' => 'Brekage',
            'description' => 'Description',
            'feedback' => 'Feedback',
            'startRepair' => 'Start Repair',
            'endRepair' => 'End Repair',
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
     * Gets query for [[IdClient0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient0()
    {
        return $this->hasOne(User::className(), ['id' => 'idClient']);
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
