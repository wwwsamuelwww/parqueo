<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/


require_once '../Backend/conectar.php';
$conn = conexion();

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['CI', 'NOMBRES', 'APELLIDOS'];

/* Nombre de la tabla */
$table = "USUARIOS";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ") AND `ESTADO` LIKE 1";
}else{
    $where = "WHERE `ESTADO` LIKE 1";
}

$sql = "SELECT " . implode(",", $columns) . " FROM $table " . $where;
$resultado = $conn->query($sql); 
$num_rows = $resultado->num_rows;

$html = '';

if($num_rows > 0){
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td><a href= "bajaUsuario.php?idUsuario=' . $row['CI'] . '" style="text-decoration:none;color:black;" >' . $row['CI'] . '</a></td>';
        $html .= '<td>' . $row['NOMBRES'] . '</td>';
        $html .= '<td>' . $row['APELLIDOS'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="3">Sin resultados</td>';
    $html .= '</tr>';
}

/* Filtrado */


echo json_encode($html, JSON_UNESCAPED_UNICODE);