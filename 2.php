<?php
$array = [
	[1, 2, 5, 4, 3],
	[9, 6, 8, 7, 10],
	[13, 12, 15, 11, 14],
	[17, 19, 16, 18, 20],
	[24, 22, 25, 21, 23],
];
for ($x = 0; $x <= 4; $x++){
	$y = 0;
	$z1 = 1;
	$smaller = $array[$x][$y];
	$z2 = $y;
	while($y < 4){
		if ($smaller > $array[$x][$z1]){
			$smaller = $array[$x][$z1];
			$z2 = $z1;
		}
	$y++;
	$z1++;
	}
		echo "Row: $x - "." $smaller ";
		echo " |  $z2  | ";
		// if($z2 > $z1)
		// 	echo("Right");
		// elseif($z2 < $z1)
		// 	echo("Left");
		// else
		// 	echo("Down");
		$smaller = NULL;
		echo "<br>";
}
/*$i = 'Tuesday';
switch ($i){
	case "Monday":
	case "Tuesday":
	case "Wednesday":
	case "Thursday":
	case "Friday":
		echo "$i is work day ;( ";
		break;
	case "Saturday":
	case "Sunday":
		echo "$i is holiday day ;) ";
		break;
}*/

/*echo '<table border="1">';
echo '<tr>';
for($x = 1; $x <= 10; $x++){
	echo '<td>';
	for($y = 1; $y <= 10; $y++){
		$z = $x * $y;
		echo " $x * $y = $z ";
		echo '<br>';
	}	
	echo '</td>';
	if ($x % 5 == 0)
		echo '</tr>';


}
echo '</table>';*/
?>