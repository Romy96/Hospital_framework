<h1>Delete species</h1>
<div class="container">
	<p>Are you sure you want to delete:</p>
	<form method="post" action="<?= URL ?>species/deleteRow/<?=$species['id']?>">
		<div>
			<input type="hidden" name="id" value="<?=$species['id']?>">
			<label for="name">Species:</label>
			<span><?=$species['species']?></span>
		</div>
		<div>
			<label></label>
			<input type="submit" name="confirmed" value="Yes">
			<input type="submit" name="canceled" value="No">
		</div>
	</form>
</div>