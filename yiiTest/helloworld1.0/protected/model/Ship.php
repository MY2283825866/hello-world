<?php

class Ship extends CActiveRecord
{
	


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ship}}';
	}
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'tag' => 'Tag',
            'userId' => 'UserId',
		);
	}

	/**
	 * Retrieves the list of posts based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed posts.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('title',$this->title,true);

		$criteria->compare('status',$this->status);

		return new CActiveDataProvider('Post', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'status, update_time DESC',
			),
		));
	}
}