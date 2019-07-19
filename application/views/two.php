<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php echo $header; ?>
	<body>
		<div class="container py-5">
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Price</th>
						<th scope="col">URL</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($product as $item): ?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['description']; ?></td>
						<td><?php echo $item['price']; ?></td>
						<td>
							<a href="<?php echo $item['url']; ?>">To Fabelio Page</a>
							or
							<a href="<?php echo base_url() . 'index.php/three/' . $item['identifier']; ?>">To Page Three</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>
