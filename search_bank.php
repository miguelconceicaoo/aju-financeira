<?php
$connect = new PDO("mysql:host=localhost:3307;dbname=banco_aju", "root", "");
if (isset($_POST["banco"])) {
	$busca = $_POST["banco"];
	$query = "select * from bancos where banco like '%".$busca."%' or cod like '%".$busca."%'     order by banco";
}
else {
	$query = "select * from bancos order by banco";
}
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '';
	foreach($result as $row) {
		$data .= '
			<option value="'.$row["banco"].'">
		';
	}
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;