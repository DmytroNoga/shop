<?php
const cols = 4;
const rows = 4;

$r1 = 0;
$c1 = 1;
$r2 = 1;
$c2 = 0;

$arr = [
	[9, 1, 8, 8],
	[8, 1, 8, 8],
	[8, 1, 1, 1],
	[8, 8, 8, 9],
];

static $road ='Point -> ';

function Find($arr, $road, $r1, $r2, $c1, $c2){
	//while (($r1 < rows and $r2 < rows and $c1 < cols and $c2 < cols)) {
	if (($r1 < rows and $r2 < rows and $c1 < cols and $c2 < cols)) {
		if ($arr[$r1][$c1] < $arr[$r2][$c2] ){
			$road .= 'Right -> ';
				$c1++;
				$c2++;
			while ($r1 < rows and $r2 < rows and $c1 == cols or $c2 == cols ) {
				$road .= 'Down -> ';
				$r1++;
				$r2++;
			}	
		}
		elseif ($arr[$r1][$c1] > $arr[$r2][$c2]){
			$road .= 'Down -> ';
				$r1++;
				$r2++;
			while ($r1 == rows or $r2 == rows and $c1 < cols and $c2 < cols ) {
				$road .= 'Right -> ';
				$c1++;
				$c2++;
			}
		}
		//else break;
		return Find($arr, $road, $r1, $r2, $c1, $c2);
	}
	else return $road;
}
$road = Find($arr, $road, $r1, $r2, $c1, $c2);
$road .= ' END!';
echo $road;
$road = NULL;
?>
