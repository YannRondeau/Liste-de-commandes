<?php
session_start();
include "../services/tools.php";

$orderNum = $_GET['orderNumber'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bons de commande</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<h2>Bons de commande</h2>
		<a href="index.php">Retourner à l'accueil</a>
	</header>
	<main>
		<?php $customer = getCustomer($orderNum); ?>
		<h3><?= $customer['customerName'] ?><br></h3>
		<h4><?= $customer['contactLastName'] . " " . $customer['contactFirstName'] ?><br></h4>
		<p><?= $customer['addressLine1'] ?><br></p>
		<p><?= $customer['city'] ?></p>
		<h1 class="trait">Bon de commande n° <?= $orderNum ?></h1>
		<table>
			<tr>
				<th>Produit</th>
				<th>Prix Unitaire</th>
				<th>Quantité</th>
				<th>Prix Total</th>
			</tr>

			<?php
				$orders = getOrderDetails($orderNum);
				

				$i = 0;
				$totaux = 0;
				
				while ($i < count($orders)) {

					$totaux += $orders[$i]['PrixTotal'];
					$i++;
				}

				$TVA = $totaux * 0.2;
				$TTC = $totaux + $TVA;
				
			?>

			<?php foreach($orders as $order): ?>
			

			<tr>
				<td><?= $order['productName'] ?></td>
				<td><?= $order['priceEach'] ?></td>
				<td><?= $order['quantityOrdered'] ?></td>
				<td><?= number_format($order['PrixTotal'],2) ?> €</td>
			</tr>

			<?php endforeach; ?>
			<tr>
				<td colspan="3" class="right color">Montant Total HT</td>
				<td class="color"><?= number_format($totaux,2) ?> €</td>
			</tr>
			<tr>
				<td colspan="3" class="right color">TVA (20%)</td>
				<td class="color"><?= number_format($TVA,2) ?> €</td>
			</tr>
			<tr>
				<td colspan="3" class="right color">Montant Total TTC</td>
				<td class="color"><?= number_format($TTC,2) ?> €</td>
			</tr>
		</table>
	</main>
</body>
</html>