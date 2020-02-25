<div class="container shadow p-4 rounded mt-5 w-50" style="background-color: #cfeaef">
<h1 class="text-center"><?= $title ?></h1>
<!-- <table class="table table-striped" >
<thead>
	<tr><th>ID</th><th>Email</th><th>Password</th><th>Name</th></tr>
</thead>
<tbody>
	<?php
	foreach($itemsUser as $key => $value){
		echo '<tr>';
		foreach($value as $value2){
			echo "<td>$value2</td>";
		}
		echo '</tr>';
	}
	?>
</tbody>
</table> -->
<?php
        $allUsers = new Tables($itemsUser);
        echo '<table class="table table-striped">';
        $allUsers->createHeader();
        $allUsers->createTBody();
       
        echo '</table>';
    ?>

</div>