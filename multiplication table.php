<?php
echo '<table border="1">';
echo '<tr>';
for($x = 1; $x <= 20; $x++){
	echo '<td>';
	for($y = 1; $y <= 10; $y++){
		$z = $x * $y;
		echo "$x * $y = $z";
		echo '<br>';
	}
	echo '</td>';
	if ($x % 5 == 0)
		echo '</tr>';
}
echo '</table>';
?>
