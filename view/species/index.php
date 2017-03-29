	<h1>Species</h1>
	<div class="container">
		<p class="options"><a href="/Hospital_framework/species/create">create</a></p>
		<table>
			<thead>
				<tr>
					<th>Species</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			</tbody>
			<?php
				foreach($species as $specie):
			?>
				<tr>
					<td><?=$specie['species']?></td>
					<td class="center"><a href="/Hospital_framework/species/edit/<?=$specie['id']?>">edit</a></td>
					<td class="center"><a href="/Hospital_framework/species/delete/<?=$specie['id']?>">delete</a></td>
				</tr>

			<?php
				endforeach;
			?>
			</tbody>
		</table>
	</div>