<div class="mitte">
	<h2>Login</h2>
</div>
<form action="/user/anmelden" method="post">

	<div id="logincontainer">
		<label for="benutzername"><b>Benutzername</b></label>
		<input type="text" placeholder="Enter Username" name="benutzername" required>

		<label for="passwort"><b>Passwort</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>

		<button name="Anmelden" type="submit">Login</button>

		<?php
			if(isset($_GET['error']) == true)
			{
				echo "<p>Your Password or Username is invalid.<p>";
			}
		 ?>
	</div>
</form>
