<h1>Edit patiënt</h1>
	<div class="container">
		<form method="post">
			<div>
				<input type="hidden" name="id" value="<?=$patient['id']?>">
				<label for="name_pet">Name pet:</label>
				<input type="text" id="name_pet" name="name_pet" value="<?=$patient['name_pet']?>">
			</div>
			<div>
				<label for="name_client">Name client:</label>
				<input type="text" id="name_client" name="name_client" value="<?=$patient['name_client']?>">
			</div>
			<div>
				<label for="species">Species:</label>
				<?php
					// Create connection
					$db = new mysqli('localhost','root','','hospital');
					// Check connection
					if ($db->connect_error) {
					     die("Connection failed: " . $db->connect_error);
					} 

					$sql = "SELECT * FROM species";
					$result = $db->query($sql);

					if ($result->num_rows > 0) {
						echo "<select>";
					     // output data of each row
					     while($row = $result->fetch_assoc()) {
					         echo "<option name='species' id='species'>" . $row["species"]. "</option>";
					     }
					     echo "</select>";
					} else {
					     echo "0 results";
					}

					$db->close();
				?>  
			</div>
			<div>
				<label for="gender">Geslacht huisdier:</label>
				<input type="radio" name="gender" id="gender" value="man"> Male<br>
	  			<input type="radio" name="gender" id="gender" value="vrouw"> Female<br>
			</div>
			<div>
				<label for="name">Species:</label>
				<textarea id="status" name="status"><?=$patient['status']?></textarea>
			</div>
			<div>
				<label></label>
				<input type="submit" value="Save">
			</div>
		</form>
	</div>