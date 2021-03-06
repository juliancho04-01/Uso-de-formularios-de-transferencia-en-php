<?php
/*
Nombre: 
Programa: DESARROLLO WEB CON PHP
Evidencia: Taller "Uso de formularios para transferencia"
*/
echo '<body style="background-color:#C8EDE1">';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Taller "Uso de formularios para transferencia"</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php

//Se requieren las funciones para imprimir el escenario y para enviar las acciones del usuario
require("escenario.php");
require("accion.php");
//Se ejecuta el if cuando el usuario envie la informacion del formulario
if(isset($_REQUEST["Enviar"])){
                //Se captura la información enviada del formulario
                $fila = $_POST['fila'];
                $puesto= $_POST['puesto'];
                $accion= $_POST['accion'];
                $StringEscenario=$_POST['lista'];
                //El String generado en el input oculto se convierte en un Array
                $count=0;
                for($i=0;$i<5;$i++){
                    for($j=0;$j<5;$j++){
                        $count=5*$i+$j;
                        //Cada captura cada elemento del Array extrayendo dicho elemento del String
                        $lista[$i][$j]=substr($StringEscenario,$count,1);
                    }
                    $count=0;
                }
        //Se devuelve el Array con la información modificada por el usuario
        $lista=Accion($fila,$puesto,$accion,$lista);
        //Se ejecuta la funcion para mostrar el Escenario, dado el Array modificado
        Escenario($lista);
}
//Se ejecuta el else if cuando el usario borra la informacion del formulario y cuando se carga la página
else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])){
    $lista=array(array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"));
    Escenario($lista);
   
}
?>
    
<body>
<center>
    <table border='2' solid #000 width='10%'>
            <form method="POST">
                <!-- Se separa el array $lista en un String y se oculta-->
                
                <input  type="hidden" name="lista" value="<?php foreach ($lista as $fila) {foreach ($fila as $puesto){echo $puesto;}}?>"  />
                
                <!-- Se crean los inputs,radio que van a capturar la información y las acciones-->
                <tr>
                    <td>Fila: </td>
                    <td>
                        <input type="text" name="fila" size="4">
                    </td>
                </tr>
                <tr>
                    <td>Puesto: </td>
                    <td>
                        <input type="text" name="puesto" size="4">
                    </td>
                </tr>
                <tr>
                    <td>Reservar: </td>
                    <td>
                        <input type="radio" name="accion" value="R" />
                    </td>
                </tr>
                <tr>
                    <td>Comprar: </td>
                    <td>
                        <input type="radio" name="accion" value="V" />
                    </td>
                </tr>
                <tr>
                    <td>Liberar: </td>
                    <td>
                        <input type="radio" name="accion" value="L" checked="checked" />
                    </td>
                </tr>
                <tr>
                <!-- botones -->
                <br>
                    <td>
                        <input type="submit" value="Enviar" name="Enviar" />
                    </td>
                    <td>
                        <input type="submit" value="Borrar" name="Reset" />
                    </td>
                </tr>
            </form>
    </table>
</center>
</body>
</html>
