<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "advert".
 *
 * @property int $idadvert
 * @property int $price
 * @property string $address
 * @property int $fk_agent
 * @property int $bedroom
 * @property int $livingroom
 * @property int $parking
 * @property int $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property int $hot
 * @property int $sold
 * @property string $type
 * @property int $recommend
 * @property int $created_at
 * @property int $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }
	
	public function behaviors(){
		return [
			TimestampBehavior::ClassName(),
		];
	}
	
	public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			['price', 'required'],
            [['price', 'fk_agent', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'recommend'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 50],
			//[['general_image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idadvert' => 'Idadvert',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent' => 'Fk Agent',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
	
	public function getUser(){
        return $this->hasOne(User::className(),['id' => 'fk_agent']);
    }
	
	public function afterValidate(){
		$this->fk_agent = Yii::$app->user->identity->id;
	}
	
	public function afterSave($insert, $changedAttributes){
		parent::afterSave($insert, $changedAttributes);
		Yii::$app->session->set('id', $this->idadvert);
	}

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}
