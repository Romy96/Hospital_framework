
	<h1>New patiënt</h1>
	<div class="container">
		<form method="post" action="<?= URL ?>patients/createSave">
			<div>
				<label for="name_pet">Name pet:</label>
				<input type="text" id="name_pet" name="name_pet">
			</div>
			<div>
				<label for="name_client">Name client:</label>
				<input type="text" id="name_client" name="name_client">
			</div>
			<div>
				<label for="species">Species:</label>
				<select name="species">
				<?php
				foreach ($species as $row):
				?>
				<option name="species" id="species" value="<?=$row['species']?>"><?=$row['species']?></option> 
				<?php
				endforeach;
				?>
				</select>
			</div>
			<div>
				<label for="gender">Geslacht huisdier:</label>
				<input type="radio" name="gender" id="gender" value="man"> Male<br>
	  			<input type="radio" name="gender" id="gender" value="vrouw"> Female<br>
			</div>
			<div>
				<label for="name">Status:</label>
				<textarea id="status" name="status"></textarea>
			</div>
			<div>
				<label></label>
				<input type="submit" value="Save">
			</div>
		</form>
	</div>