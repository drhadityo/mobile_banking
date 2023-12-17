<?php
	require 'adminPermission.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transfer</title>
</head>
<body>
	<?php 
	$rek = $_GET['no_rek'];
	echo"
		<form action='transfer.php?no_rek=$rek' method='POST'>";
	?>
		<?php include 'prosesTransfer.php';?>
		<div>
			<label for="rekening_tujuan">Rekening Penerima:<label>
			<input type="text" name="rek_no_rek" value="">
			<span class="pesan_error"><?php echo $rekening_error; ?></span>
		</div>
		<div>
			<label for="jumlah">Nominal</label>
			<input type="text" name="jumlah" value="">
			<span class="pesan_error">
				<?php echo $jumlah_error; ?>
			</span>
		</div>
		<div>
			<input type="submit" name="submit" value="Transfer">
			<span class="pesanError">
				<?php echo $form_error; ?>
			</span>
		</div>
	</form>
</body>
</html>