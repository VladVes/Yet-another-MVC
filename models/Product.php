<?php
namespace app\models;
use app\interfaces\IModel;

class Product extends Model implements IModel
{
	protected static $tableName = "product";

	public static function getTableName()
	{
		return self::$tableName;
	}

	public static function getCardById($id)
	{
		$cardData = static::getById($id);

		$cardData->type_id = Type::getById($cardData->type_id)->product_type;
		$cardData->brand_id = Brand::getById($cardData->brand_id)->product_brand;

		//var_dump($cardData);
		//exit;
		return $cardData;



	}




}

?>