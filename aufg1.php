<?php 
//header('Content-Type: text/html; charset=UTF-8');

$handle = fopen("Probeaufgabe_Testdaten.csv", "r");

while (($row = fgetcsv($handle, 200, ";")) !== FALSE)
{
	if(empty($header)) {
		$header = $row;
	}
	else {
			$csv[] = array_combine($header, $row);
	}
}
fclose($handle);

shuffle($csv);
?>
<html>
<head>
<title>Aufgabe 1</title>
<!-- <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
</head>
  
<body>
<table border="1" style="border:1px solid #000000;">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>cond</th>
		<th>vat</th>
	</tr>

	<?php for($i = 0; $i <sizeof($csv); $i++){ ?>
	<tr>
		<td><?php echo $csv[$i]["id"]?></td>
		<?php if(mb_detect_encoding($csv[$i]["name"]) == "UTF-8") { ?>
		<td><?php echo utf8_decode($csv[$i]["name"])?></td>
		<?php } else {?>
		<td><?php echo $csv[$i]["name"]?></td>
		<?php } ?>
		<td><?php echo $csv[$i]["cond"]?></td>
		<td><?php echo $csv[$i]["vat"]?></td>
	<tr>
	<?php } ?>
</table>
</body>
</html></html>