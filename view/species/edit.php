<h1>Edit species</h1>
<div class="container">
	<form method="post" action="<?= URL ?>species/editSave/<?=$species['id']?>">
		<div>
			<input type="hidden" name="id" value="<?=$species['id']?>">
			<label for="species">Species:</label>
			<input type="text" id="species" name="species" value="<?=$species['species']?>">
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>
</div>