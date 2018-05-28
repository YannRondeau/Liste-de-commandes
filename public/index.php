<?php
session_start();
include "../services/tools.php"

?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste des commandes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<h2>Bons de commande</h2>
	</header>
	<main>
		<h1>Liste des commandes</h1>
		<table>
			<tr>
				<th>Commande</th>
				<th>Date de la commande</th>
				<th>Date de livraison</th>
				<th>Statut</th>
			</tr>

			<?php
				$orders = getOrderList();
			?>

			<?php foreach($orders as $order): ?>


			<tr>
				<td><a href="bonsCommande.php?orderNumber=<?= $order['orderNumber'] ?>"><?= $order['orderNumber'] ?></a></td>
				<td><?= $order['orderDate'] ?></td>
				<td><?= $order['shippedDate'] ?></td>
				<td><?= $order['status'] ?></td>
			</tr>

			<?php endforeach; ?>

		</table>
	</main>
</body>
</html>