<h1>Edit cliënt</h1>
	<div class="container">
		<form method="post" action="<?= URL ?>clients/editSave/<?=$client['id']?>">
			<div>
				<input type="hidden" name="id" value="<?=$client['id']?>">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" value="<?=$client['name']?>">
			</div>
			<div>
				<input type="submit" value="Save">
			</div>
		</form>
	</div>