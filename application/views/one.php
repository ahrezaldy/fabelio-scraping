<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php echo $header; ?>
	<body>
		<div class="container py-5">
			<div class="jumbotron">
				<form method="POST">
  					<div class="form-group row">
					  	<div class="col-10">
							<input type="text" class="form-control" id="txt-url" name="url" placeholder="https://fabelio.com/ip/wooden-cutting-tray.html">
						</div>
					  	<div class="col-2">
							<input type="submit" class="btn btn-primary" id="btn-submit" name="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
