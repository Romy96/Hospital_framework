<div class="container">
	<h1>Patiënts</h1>
	<p class="options"><a href="/Hospital_framework/patients/create">create</a></p>
	<table>
		<thead>
			<tr>
				<th><a href="/Hospital_framework/patients/index/?sort=name_pet&order=<?=$order?>">Name pet</a></th>
				<th><a href="/Hospital_framework/patients/index/?sort=name_client&order=<?=$order?>">Name client</a></th>
				<th><a href="/Hospital_framework/patients/index/?sort=species&order=<?=$order?>">Species</a></th>
				<th>Gender pet</th>
				<th>Status</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		</tbody>
<?php
	foreach($patients as $patient):
?>
			<tr>
				<td><?=$patient['name_pet']?></td>
				<td><?=$patient['name_client']?></td>
				<td><?=$patient['species']?></td>
				<td><?=$patient['gender']?></td>
				<td><?=$patient['status']?></td>
				<td class="center"><a href="/Hospital_framework/patients/edit/<?=$patient['id']?>">edit</a></td>
				<td class="center"><a href="/Hospital_framework/patients/delete/<?=$patient['id']?>">delete</a></td>
			</tr>

<?php
	endforeach;
?>
		</tbody>
	</table>
	
</div>