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
			<div class="jumbotron">
				<h3>Comments</h3>
				<form action="<?php echo base_url() . 'index.php/three/comment/' . $product[0]['id']; ?>" method="POST">
  					<div class="form-group row">
					  	<div class="col-10">
							<textarea class="form-control" id="txtarea-comment" name="comment" rows="3"></textarea>
						</div>
					  	<div class="col-2">
							<input type="submit" class="btn btn-primary" id="btn-submit" name="submit" value="Give Comment">
						</div>
					</div>
				</form>
				<?php foreach ($comment as $item): ?>
					<hr>
					<div class="row">
						<div class="col-10">
							<p><?php echo $item['comment']; ?></p>
							<p><small><?php echo date('d-m-Y H:i:s', $item['timestamp']); ?></small></p>
						</div>
						<div class="col-2">
							<a href="<?php echo base_url() . 'index.php/three/upvote/' . $item['id']; ?>" class="btn btn-success">+1</a>
							<a href="<?php echo base_url() . 'index.php/three/downvote/' . $item['id']; ?>" class="btn btn-danger">-1</a>
							<p><small>Score: <?php echo ($item['upvote']-$item['downvote']); ?></small></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>
