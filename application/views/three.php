<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php echo $header; ?>
	<body>
		<div class="container py-5">
			<div class="jumbotron">
				<h1><?php echo $product[0]['name']; ?></h1>
				<p class="lead">Last price: <?php echo $product[0]['price']; ?></p>
				<hr>
				<p><?php echo $product[0]['description']; ?></p>
			</div>
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th scope="col">Price</th>
						<th scope="col">Date Time</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($prices as $price): ?>
					<tr>
						<td><?php echo $price['price']; ?></td>
						<td><?php echo date('d-m-Y H:i:s', $price['timestamp']); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>
