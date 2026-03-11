<?php
/*call by value */
function add($a){
    return $a+=$a;//$a=45;
}
echo(add(45));echo"<br>";
function sum($a){return $a+=$a;}
$a=45;
echo("<br> first sum: ".sum($a));echo"<br>";
/*default value */
function sum1($a, $b=56){
    return $a+=$b;}
$a=45;
echo("(<br> first sum: ".sum1($a,65)); echo "<br>";
echo("<br> second sum: ".sum1($a));echo "<br>";
/*length arguments */
function sum2(...$a){//print r($a);
$total=0;
foreach($a as $valu){$total+=$valu;}
return $total;
}
$a=45;
echo("<br> first sum: ".sum2(1, 2, 34, 5, 6)); echo("<br> second sum: ". sum2(1, 2)); /* call by reference */
function calbyval($a){//lcall by value
$b=30;
return $b+=$a;}
$a=45;
echo("<br> cal by val sum: ".calbyval($a));
echo("<br> a value: ".$a);echo "<br>"; 
function calbyre(&$a){//call by reference &
$b=30;
//return $b+=$a;//b=b+a
return $a+=$b;}//a=atb
$a=45;
echo("<br> cal by ref sum: ".calbyre($a));
echo("<br> a value: ".$a); echo"<br>";
?>