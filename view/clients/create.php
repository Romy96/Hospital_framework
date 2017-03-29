	<h1>New cliënt</h1>
	<div class="container">
		<form method="post" action="<?= URL ?>clients/createSave">
			<div>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name">
			</div>
			<div>
				<input type="submit" value="Save">
			</div>
		</form>
	</div>