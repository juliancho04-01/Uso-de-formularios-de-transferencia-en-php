<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <center>
    <h3>Escenario</h3>
    </center>     
<?php
function Escenario($lista){
    //Se crea la tabla y sus encabezados
echo "<table class='tg' border='1' width='25%' solid #000 style='margin:auto'>";
    echo "<tr>";
    echo "<tr>";
        echo "<th></th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th> 
        <th>5</th>
    </tr>";     
$i=1;
// Imprimimos el contenido de la tabla
foreach ($lista as $fila) {
    echo "<tr>";
       echo "<th>";
       echo $i;
       echo "</th>";
    foreach ($fila as $silla) {
        echo "<td>";
        echo $silla;
        echo "</td>";
    }
    echo "</tr>";
    $i++;
    }
echo "</table>";
}
?> 
</body>
</html>



