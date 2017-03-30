<?php

namespace app\models;
use app\interfaces\IModel;

class Order extends Model implements IModel
{
	protected static $tableName = '`order`';

	public static function getTableName() 
	{
		return static::$tableName;
	}

	public function getOrder($id)

	{
		//Я понял задание таким образом:

		/*для начала получаем строку по id из таблицы закзов, что бы потом имея на руках все внешние ключи
		получить все связанные с заказом данные (из других таблиц)*/
		$order = static::getByIdFetchAll($id);  


		/* Для каждой таблицы из которой мы берем данные, создается 
		её представление в php скрипете в виде класса, а потом уже из этого класса
		мы получаем, используя статический метод getById, искомую строку таблицы*/


		$customer = Customer::getByIdFetchAll($order['customer_id']);
		$product = Product::getByIdFetchAll($order['product_id']);
		$type = Type::getByIdFetchAll($product['type_id']);
		$brand = Brand::getByIdFetchAll($product['brand_id']);

		/*Но есть ли смылс в принципе так решать задачу если можно писать сложные запросы, join-нить таблицы и из них выбирать нужные поля по условиям при этом исользовтаь только класс Order? Вместо того что бы брать каждый класс и получать по нему строку из таблицы что бы потом выбрать из нее нужные поля и записать в коненый массив... 

		Насколько верно или нет я выполнил задачу ?
		*/


		/* формируем массив для возврата или вывода: */
		$output['orderNum'] = $order['id'];
		$output['orderCustomer'] = $customer['name'];
		$output['productName'] = $product['name'];
		$output['productType'] = $type['product_type'];
		$output['productBrand'] = $brand['product_brand'];
		$output['productQuantity'] = $order['quantity'];
		$output['productPrice'] = $product['price'];
		
		foreach ($output as $k => $v) {
			echo "{$k} : {$v}<br>";
		}


		//return $output;
	}

	public function getAllOrders()
	{
		$allorders = static::getAll();

		var_dump($allorders);

		foreach ($allorders as $order) {
			$order_id = $order['id'];
			$this->getOrder($order_id);
		}
	}
}

?>