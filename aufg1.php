<?php 
setlocale(LC_ALL, 'en_US.iso8859-1');  
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
// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";
?>
<html>
<head>
<title>Aufgabe 1</title>
</head>
  
<body>
<table border="1" style="border:1px solid #000000;">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>cond</th>
		<th>vat</th>
	</tr>

	<?php for($i = 0; $i < 10; $i++){ ?>
	<tr>
		<td><?php echo $csv[$i]["id"]?></td>
		<td><?php echo htmlentities($csv[$i]["name"])?></td>
		<td><?php echo $csv[$i]["cond"]?></td>
		<td><?php echo $csv[$i]["vat"]?></td>
	<tr>
	<?php } ?>
</table>
</body>
</html>