<div class="mitte">
	<h2>Login</h2>
</div>
<form action="/user/anmelden" method="post">

	<div class="formcontainer">
		<label><b>Benutzername</b></label>
		<input type="text" placeholder="Enter Username" name="benutzername" required>

		<label><b>Passwort</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>

		<button name="Anmelden" type="submit">Login</button>

		<?php
			if(isset($_GET['error1']) == true)
			{
				echo "<p class=\"error\">Your Password or Username is invalid.<p>";
			}
		 ?>
	</div>
</form>

<div class="mitte">
	<h2>Passwort wechseln</h2>
</div>

<form action="/user/passwortwechseln" method="post">

	<div class="formcontainer">
		<label><b>Benutzername</b></label>
		<input type="text" placeholder="Enter Username" name="resetbenutzername" required>

		<label><b>Aktives Passwort</b></label>
		<input type="password" placeholder="Enter Password" name="oldpassword" required>

		<label><b>Neues Passwort</b></label>
		<input type="password" placeholder="Enter new Password" name="newpassword" required>

		<button name="wechseln" type="submit">Passwort wechseln</button>

		<?php
			if(isset($_GET['success']) == true)
			{
				echo "<p class=\"success\">Successful change.";
			}
			if(isset($_GET['error2']) == true)
			{
				echo "<p class=\"error\">Your Password or Username is invalid.<p>";
			}
		 ?>
	</div>
</form>
