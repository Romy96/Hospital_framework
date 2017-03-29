	<h1>Clients</h1>
	<div class="container">
		<p class="options"><a href="/Hospital_framework/clients/create">create</a></p>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			</tbody>
		<?php
			foreach($clients as $client):
		?>
				<tr>
					<td><?=$client['name']?></td>
					<td class="center"><a href="/Hospital_framework/clients/edit/<?=$client['id']?>">edit</a></td>
				<td class="center"><a href="/Hospital_framework/clients/delete/<?=$client['id']?>">delete</a></td>
				</tr>

		<?php
			endforeach;
		?>
			</tbody>
		</table>
	</div>