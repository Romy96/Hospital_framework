<h1>Delete patiënt</h1>
	<div class="container">
		<?php
		if(isset($patient)):
		?>
		<p>Are you sure you want to delete:</p>
		<form method="post" action="<?= URL ?>patients/deleteRow/<?=$patient['id']?>">
			<div>
				<input type="hidden" name="id" value="<?=$patient['id']?>">
				<label for="name_pet">Name:</label>
				<span><?=$patient['name_pet']?></span>
			</div>
			<div>
				<label for="name_client">Name_client:</label>
				<span><?=$patient['name_client']?></span>
			</div>
			<div>
				<label for="name">Species:</label>
				<span><?=$patient['species']?></span>
			</div>
			<div>
				<label></label>
				<input type="submit" name="confirmed" value="Yes">
				<input type="submit" name="canceled" value="No">
			</div>
		</form>
		<?php
		endif;
		?>
	</div>