<?php

function pre($str) {
	echo "<pre>";
	print_r($str);
	echo "</pre>";
}


function getOrderList() {
	include "connexion.php";

	$sql = "SELECT orderNumber, orderDate, shippedDate, status FROM orders ORDER BY orderNumber";

	$statement = $db->prepare($sql);
	$statement->execute();
	$orders = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $orders;
}

function getCustomer($orderNum) {
	include 'connexion.php';

	
	$sql = "SELECT customerName, contactLastName, contactFirstName, addressLine1, city FROM customers JOIN orders ON orders.customerNumber = customers.customerNumber WHERE orderNumber = $orderNum";

	$statement = $db->prepare($sql);
	$statement->execute();
	$customer = $statement->fetch(\PDO::FETCH_ASSOC);
	

	return $customer;
}

function getOrderDetails($orderNum) {
	include "connexion.php";

	$sql = "SELECT productName, priceEach, quantityOrdered, (priceEach * quantityOrdered) AS PrixTotal FROM orderdetails JOIN products ON products.productCode = orderdetails.productCode WHERE orderNumber = $orderNum";

	$statement = $db->prepare($sql);
	$statement->execute();
	$details = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $details;
}

