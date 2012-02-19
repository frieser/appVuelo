<?php

$ourFileName = "/home/frieser/vueloapp/web/kml_tmp/test.kml";

$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
 
//página php de ejemplo que realiza una consulta en la base de datos
//y retorna un kml al navegador del cliente
 
//crea la conexión con la base de datos
$dbconn = pg_connect("host=localhost port=5432 dbname=vuelo user=postgres password=puntero21")
or die ("No pudo conectar");
 
// definición de la consulta
// retorna los polígonos que conforman los diferentes condados del estado cargado en postgis
$sql = "select nombre,  ST_AsKML(area) as thegeom  from app.zonas;";

$sql_posciones="select avion,  ST_AsKML(posicion) as thegeom  from app.avion_posicion";

$sql_aeropuertos="select nombre,  ST_AsKML(posicion) as thegeom  from app.aeropuertos";
 
//ejecuta la consulta en el motor de base de datos
//el resultado consta de un arreglo con todas las filas que cumplen la condición de la consulta
$query_result = pg_Exec($dbconn,$sql) or die (pgErrorMessage());
$query_result_posciones = pg_Exec($dbconn,$sql_posciones) or die (pgErrorMessage());
$query_result_aeropuertos = pg_Exec($dbconn,$sql_aeropuertos) or die (pgErrorMessage());
//creamos el string que representará el kml de resultado
$kml="<kml xmlns=\"http://www.opengis.net/kml/2.2\"><Folder>";
// procesamos los resultados de la consulta (procesamos las filas)
for ($i = 0; $i < pg_numrows($query_result); $i++) {
    // obtiene los valores de cada una de las columnas de la consulta
    $townname = pg_result($query_result, $i, 0);
    $townkml =  pg_result($query_result, $i, 1);
 
    //creamos el placemark para la fila
    $kml .= "<Placemark><name>Zona: ".$townname."</name><description>".$townname."</description>".$townkml."</Placemark>\n";
}

for ($i = 0; $i < pg_numrows($query_result_posciones); $i++) {
    // obtiene los valores de cada una de las columnas de la consulta
    $townname = pg_result($query_result_posciones, $i, 0);
    $townkml =  pg_result($query_result_posciones, $i, 1);
 
    //creamos el placemark para la fila
    $kml .= "<Placemark><name>Avion: ".$townname."</name><description>".$townname."</description>".$townkml."</Placemark>\n";
}

for ($i = 0; $i < pg_numrows($query_result_aeropuertos); $i++) {
    // obtiene los valores de cada una de las columnas de la consulta
    $townname = pg_result($query_result_aeropuertos, $i, 0);
    $townkml =  pg_result($query_result_aeropuertos, $i, 1);
 
    //creamos el placemark para la fila
    $kml .= "<Placemark><name>Aeropuerto: ".$townname."</name><description>".$townname."</description>".$townkml."</Placemark>\n";
}
 
//cerramos el documento kml
$kml .= "</Folder></kml>";

fwrite($ourFileHandle, $kml);
 
//instrucción para que el navegador sepa que el documento es de tipo kml
header('Content-Type: application/vnd.google-earth.kml+xml');

 
//cierra la conexión de base de datos
pg_close($dbconn);
fclose($ourFileHandle);
 
//envia  el documento kml al navegador del usuario
echo $kml;

?>
