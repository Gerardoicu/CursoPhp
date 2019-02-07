<?php
require("devuelveproductos.php");
$productos=new DevuelProductos();
$array_procutos=$productos->getProductos();
?>
<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Mostrar Productos</title>
</head>

<body>
	<?php
	echo "<div class='limiter'>
		<div class='container-table100'>
			<div class='wrap-table100'>
				<div class='table100 ver1 m-b-110'>
					<table data-vertable='ver1'>
						<thead>
				<tr class='row100 head'>
						
								<th class='column100 column1' data-column='column1'>CODIGO ARTICULO</th>
								<th class='column100 column2' data-column='column2'>SECCION</th>
								<th class='column100 column3' data-column='column3'>NOMBRE ARTICULO</th>
								<th class='column100 column4' data-column='column4'>PRECIO</th>
								<th class='column100 column5' data-column='column5'>FECHA</th>
								<th class='column100 column6' data-column='column6'>IMPORTADO</th>
								<th class='column100 column7' data-column='column7'>PAIS DE ORIGEN</th>
							</tr>
						</thead>		
						";
	foreach($array_procutos as $elemento){
		echo "<tbody>
							<tr class='row100'>";
		echo "<td class='column100 column1' data-column='column1'>".$fila['CÓDIGOARTÍCULO']."</td>";
		echo "<td class='column100 column2' data-column='column2'>".$fila['SECCIÓN']."</td>";
		echo "<td class='column100 column3' data-column='column3'>".$fila['NOMBREARTÍCULO']."</td>";
	 	echo "<td class='column100 column4' data-column='column4'>".$fila['PRECIO']."</td>";
	 	echo "<td class='column100 column5' data-column='column5'>".$fila['FECHA']."</td>";
	 	echo "<td class='column100 column6' data-column='column6'>".$fila['IMPORTADO']."</td>";
	 	echo "<td class='column100 column7' data-column='column7'>".$fila['PAÍSDEORIGEN']."</td></tr> ";
		}
	echo "</table>";
	?>
	
</body>
</html>
