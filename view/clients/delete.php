<h1>Delete client</h1>
<div class="container">
	<p>Are you sure you want to delete:</p>
	<form method="post" action="<?= URL ?>clients/deleteRow/<?=$client['id']?>">
		<div>
			<input type="hidden" name="id" value="<?=$client['id']?>">
			<label for="name">Name:</label>
			<span><?=$client['name']?></span>
		</div>
		<div>
			<label></label>
			<input type="submit" name="confirmed" value="Yes">
			<input type="submit" name="canceled" value="No">
		</div>
	</form>
</div>