<?php
session_set_cookie_params(3600*24);
session_start();
if (is_null($_SESSION['i'])) {
    $_SESSION['i'] = 0;
    $_SESSION['arr'] = array();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
<table>
<form action="out.php" target="_blank" method="GET" id="data"> 
  <tr>
    <th> </th>
    <th>Расковалова Алёна, <b id="group">3202</b>, <b id="var">202017</b></th>
  </tr>
  <tr>
    <td>X</td>
    <td>
          <input type="text" name="X" id="X" value="0" placeholder="{-5...3}">
    </td>
  </tr>
  <tr>
    <td>Y</td>
    <td>
    -5<input type="radio" name="Y" value="-5" checked> 
    -4<input type="radio" name="Y" value="-4"> 
    -3<input type="radio" name="Y" value="-3"> 
    -2<input type="radio" name="Y" value="-2"> 
    -1<input type="radio" name="Y" value="-1"> 
    0<input  type="radio" name="Y" value="0">
    1<input type="radio" name="Y" value="1"> 
    2<input type="radio" name="Y" value="2"> 
    3<input type="radio" name="Y" value="3"> 
  </td>
  </tr>
  <tr>
    <td>R</td>
    <td>
      1<input type="radio" name="R" value="1" checked>
      2<input type="radio" name="R" value="2">
      3<input type="radio" name="R" value="3">
      4<input type="radio" name="R" value="4">
      5<input type="radio" name="R" value="5">
    </td>
  </tr>
  <tr>
    <td>График</td>
    <td>
    <div class="animate2">
    <img class="first" src="img/mem.jpg" />
    <img class="second" src="img/raf.jpg" />
    </div>
    </td>
  </tr>
  <tr>
  	<td></td>
  	<td style="text-align:right">
    	<button id="submit-btn" type="submit" class="submit-btn">Проверить попадание</button>
    </td>
  </tr>
   <tr>
   	<td colspan="2"><p class="panel hidden msg" id="msg"></p></td>
  </tr>
</table>
</form>
<script src="script.js" defer></script>
</body>
</html>