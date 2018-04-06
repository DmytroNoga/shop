<?php include 'Matrix.php'; 
$mat = new Matrix(2,2);

$mat->SetElem(0,0,1);
$mat->SetElem(0,1,2);
$mat->SetElem(1,0,3);
$mat->SetElem(1,1,4);

$mat2 = new Matrix(2,2);

$mat2->SetElem(0,0,5);
$mat2->SetElem(0,1,6);
$mat2->SetElem(1,0,7);
$mat2->SetElem(1,1,8);


$MultiplyResult = $mat->Multiply($mat2);
$ScalarResult   = $mat->ScalarMultiply(2);
$AddResult      = $mat->Add($mat2);
$SubtractResult = $mat->Subtract($mat2);

var_dump ($MultiplyResult);
var_dump ($ScalarResult);
//var_dump ($AddResult);
//var_dump ($SubtractResult);
?>