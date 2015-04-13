<?php
?>

<table>
<?php foreach ($model as $key => $value) {?>
<tr>
	<td><?=$value['id']?></td>
	<td><?=$value['code']?></td>
	<td><?=$value['name']?></td>
</tr>
<?php } ?>
</table>







