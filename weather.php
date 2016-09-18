<?php
	require "main.php";

	if(isset($_SESSION['token'])) {
		try {
			echo "<p>".$_SESSION['stat']."</p>";
			unset($_SESSION['stat']);
?>
			<form method="post" action="status.php">
				<select name="city">
					<option value="Jakarta">Jakarta</option>
					<option value="Bogor">Bogor</option>
					<option value="Bandung">Bandung</option>
					<option value="Medan">Medan</option>
					<option value="Surabaya">Surabaya</option>
					<option value="Makassar">Makassar</option>
				</select>
				<button type="submit">Submit</button>
			</form>
<?php
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			echo $e->getMessage();
			exit();
		}
	} else {
		require "index.php";
	}
?>