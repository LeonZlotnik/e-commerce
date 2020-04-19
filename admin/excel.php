<?php 

$conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
mysqli_set_charset($conn, "utf8");

$sql = "SELECT *, (costo*cantidad) AS total FROM ordenes, registros WHERE ordenes.nom_usuario = registros.nom_usuario";

$result = mysqli_query($conn,$sql);

$html = "<table>
            <tr>
                <th>Usuario</th>
                <th>Producto</th>
                <th>Total_Comprado</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>CP</th>
                <th>Fecha_Compra</th>
            </tr>s
        ";

while($row = mysqli_fetch_assoc($result)){
    $html .= "<tr>
                <td>".$row['nom_usuario']."</td>
                <td>".$row['producto']."</td>
                <td>$".$row['total']."</td>
                <td>".$row['email']."</td>
                <td>".$row['direccion']."</td>
                <td>".$row['municipio']."</td>
                <td>".$row['estado']."</td>
                <td>".$row['cp']."</td>
                <td>".$row['fecha']."</td>
             </tr>";
     $htmil .= "</table>";
}
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=Corpoh9_reporte.xls');

echo $html;

?>