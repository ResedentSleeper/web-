<?php
session_start();

class Data
{
//координаты
var $x_dot;
var $y_dot;
var $r_dot;
//hit-or-miss
var $hom;

function GetX() { return $this->x_dot;}
function SetX($x_dot) { $this->x_dot = $x_dot; }

function GetY() {return $this->y_dot;}
function SetY($y_dot) {$this->y_dot = $y_dot;}

function GetR() {return $this->r_dot;}
function SetR($r_dot) {$this->r_dot = $r_dot;}

function GetHOM() {return $this->hom;}
function SetHOM($hom) {$this->hom = $hom;}

}


function input($x_val, $y_val, $r_val){
	if (stristr($x_val, ',') === TRUE) {
		$x_val = str_replace(',', '.', $x_val);
	} 
	if(empty($x_val) && empty($y_val) && empty($r_val)){
		return FALSE;
	} elseif (!is_numeric($x_val)){
		return FALSE;
	}else {
		$x_val = (float)$x_val;
		return TRUE;
	}
}

function hit_or_miss ($x_val, $y_val, $r_val){
	$x_val = (float)$x_val;
	if ( ($x_val>=0)&&($y_val<=0)&&(pow($x_val,2)+pow($y_val,2)<=pow($r_val,2)) || ($x_val<=0)&&($y_val<=0)&&($x_val>=-$r_val)&&($y_val>=(-$r_val/2)) || ($x_val>=0)&&($y_val>=0)&&($y_val<=($r_val-$x_val)) ){
		return TRUE;
	} else {
		return FALSE;	
	}
}


function getTable($limit) {
	$funcX = "GetX";
	$funcY = "GetY";
	$funcR = "GetR";
	$funch = "GetHOM";

    echo "<table>";
    echo "<tr> <th>X</th> <th>Y</th> <th>R</th> <th>Результат</th></tr>";
    if (count($_SESSION['arr']) < 10){
    	foreach ($_SESSION['arr'] as $item) {
    		echo '<tr><td>'.$item->$funcX() . '</td><td>' .$item->$funcY(). '</td><td>' . $item->$funcR() . '</td><td>' . $item->$funch() . '</td></tr>';
    	}
    }else { 
    	while (count($_SESSION['arr']) >= $limit){
    	array_shift($_SESSION['arr']);
    	foreach ($_SESSION['arr'] as $item) {
    		echo '<tr><td>'.$item->$funcX() . '</td><td>' .$item->$funcY(). '</td><td>' . $item->$funcR() . '</td><td>' . $item->$funch(). '</td></tr>';
    	}
    }
}
    echo "</table> <br>";
}

    $x = str_replace(',', '.', $_GET['X']);
	$y = (int)$_GET['Y'];
	$r = (int)$_GET['R'];
	
	date_default_timezone_set("UTC");
	$time = time() + 3 * 3600;

	if (!(input($x, $y, $r))) { /*Данные введены не все*/
		$object = new Data;

		$object->x_dot = '(」°ロ°)」';
		$object->y_dot = '(」°ロ°)」';
		$object->r_dot = '(」°ロ°)」';
		$object->hom = 'Невозможно проверить точку, т.к. вы ввели не все данные<br> Убедитесь, что x [-5..3] и повторите попытку';

		array_push($_SESSION['arr'], $object);

	} else { 

		if ((hit_or_miss($x, $y, $r))){
			$object1 = new Data;

			$object1->x_dot = (float)$x;
			$object1->y_dot = $y;
			$object1->r_dot = $r;
			$object1->hom = 'Попадание';

			array_push($_SESSION['arr'], $object1);
		}
		
		else {
			$object2 = new Data;

			$object2->x_dot = (float)$x;
			$object2->y_dot = $y;
			$object2->r_dot = $r;
			$object2->hom = 'Нет попадания';
			
			array_push($_SESSION['arr'],  $object2);
		}
		
}

getTable(10);

echo "<p id='time'>Текущее время: ".date("H:i:s", $time)."</p>";

?>

	<!DOCTYPE html> 
	<html> 
	<head> 
	<title>Результат</title> 
	<meta charset="utf-8">  
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	</head>
	<body> 
	</body>
	</html>