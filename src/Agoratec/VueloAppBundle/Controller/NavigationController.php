<?php

namespace Agoratec\VueloAppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class NavigationController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AgoratecVueloAppBundle:Navigation:index.html.twig');
    }


    public function kmlAction($lat,$lng)
    {
       //$lat=$_GET["lat"];
	//$lng=$_GET["lng"];

	$url=date("d-m-Y-H:i:s").'_test.kml';
	$ourFileName = "/home/frieser/www/appvuelo/web/kml_tmp/".$url;
	//return new Response($url);
	$ourFileHandle = fopen($ourFileName, 'w') or die("can't ooopen file");
	 
	//pÃ¡gina php de ejemplo que realiza una consulta en la base de datos
	//y retorna un kml al navegador del cliente
	 
	//crea la conexiÃ³n con la base de datos
	$dbconn = pg_connect("host=localhost port=5432 dbname=vuelo user=postgres password=puntero21")
	or die ("No pudo conectar");
	 
	// definiciÃ³n de la consulta
	// retorna los polÃ­gonos que conforman los diferentes condados del estado cargado en postgis
	$sql = "select nombre,  ST_AsKML(area) as thegeom  from app.zonas;";

	$sql_posciones="select avion,  ST_AsKML(posicion) as thegeom  from app.avion_posicion";

	$sql_aeropuertos="select nombre,  ST_AsKML(posicion) as thegeom  from app.aeropuertos";
	 
	//ejecuta la consulta en el motor de base de datos
	//el resultado consta de un arreglo con todas las filas que cumplen la condiciÃ³n de la consulta
	$query_result = pg_Exec($dbconn,$sql) or die (pgErrorMessage());
	$query_result_posciones = pg_Exec($dbconn,$sql_posciones) or die (pgErrorMessage());
	$query_result_aeropuertos = pg_Exec($dbconn,$sql_aeropuertos) or die (pgErrorMessage());
	//creamos el string que representarÃ¡ el kml de resultado
	$kml="<kml xmlns=\"http://www.opengis.net/kml/2.2\"><Document>";
	$kml.="<Style id=\"normalState\">
	    <IconStyle>
	      <scale>1.0</scale>
	      <Icon><href>http://192.168.1.13/bundles/agoratecvueloapp/images/navigation/planecrash.png</href>
	      </Icon>
	    </IconStyle>
	    <LabelStyle>
	      <scale>2.0</scale>
	    </LabelStyle>
	  </Style>
	   <Style id=\"transBluePoly\">
      <LineStyle>
        <width>2</width>
        <color>cc000000</color>
      </LineStyle>
      <PolyStyle>
        <color>66ffffff</color>
      </PolyStyle>
    </Style>
	  <Style id=\"highlightState\">
	    <IconStyle>
	      <Icon><href>http://192.168.1.13/bundles/agoratecvueloapp/images/navigation/airport-runway.png</href>
	      </Icon>
	      <scale>2.0</scale>
	    </IconStyle>
	    <LabelStyle>
	      <scale>1.1</scale>
	      <color>ff0000c0</color>
	    </LabelStyle>
	  </Style>
	  <StyleMap id=\"styleMapExample\">
	    <Pair>
	      <key>normal</key><styleUrl>#normalState</styleUrl>
	    </Pair>
	    <Pair>
	      <key>highlight</key><styleUrl>#highlightState</styleUrl>
	    </Pair>
	  </StyleMap>
	<StyleMap id=\"styleMapAeroExample\">
	    <Pair>
	      <key>normal</key><styleUrl>#highlightState</styleUrl>
	    </Pair>
	  </StyleMap>";


	$kml.="<Folder>";
	// procesamos los resultados de la consulta (procesamos las filas)
	for ($i = 0; $i < pg_numrows($query_result); $i++) {
	    // obtiene los valores de cada una de las columnas de la consulta
	    $townname = pg_result($query_result, $i, 0);
	    $townkml =  pg_result($query_result, $i, 1);
	 
	    //creamos el placemark para la fila
	    $kml .= "<Placemark><name>Zona: ".$townname."</name> <styleUrl>#transBluePoly</styleUrl><description>".$townname."</description>".$townkml."</Placemark>\n";
	}

	for ($i = 0; $i < pg_numrows($query_result_posciones); $i++) {
	    // obtiene los valores de cada una de las columnas de la consulta
	    $townname = pg_result($query_result_posciones, $i, 0);
	    $townkml =  pg_result($query_result_posciones, $i, 1);
	 
	    //creamos el placemark para la fila
	    $kml .= "<Placemark><styleUrl>#styleMapExample</styleUrl><name>Avion: ".$townname."</name><description>".$townname."</description>".$townkml."</Placemark>\n";
	}

	for ($i = 0; $i < pg_numrows($query_result_aeropuertos); $i++) {
	    // obtiene los valores de cada una de las columnas de la consulta
	    $townname = pg_result($query_result_aeropuertos, $i, 0);
	    $townkml =  pg_result($query_result_aeropuertos, $i, 1);
	 
	    //creamos el placemark para la fila
	    $kml .= "<Placemark><styleUrl>#styleMapAeroExample</styleUrl><name>Aeropuerto: ".$townname."</name><description>".$townname."</description>".$townkml."</Placemark>\n";
	}

	//tb incluios la posicion del usuario
	$kml .= "<Placemark><styleUrl>#styleMapExample</styleUrl><name>Tu posicion</name><description>Tu posicion</description><Point><coordinates>".$lng.",".$lat."</coordinates></Point></Placemark>\n";
	 
	//cerramos el documento kml
	$kml .= "</Folder></Document></kml>";

	fwrite($ourFileHandle, $kml);
	 
	//instrucciÃ³n para que el navegador sepa que el documento es de tipo kml
	header('Content-Type: application/vnd.google-earth.kml+xml');

	 
	//cierra la conexiÃ³n de base de datos
	pg_close($dbconn);
	fclose($ourFileHandle);
	 
	//envia  el documento kml al navegador del usuario
	$url='http://150.241.237.246/kml_tmp/'.$url;
	return new Response($url);
	
    }
}
