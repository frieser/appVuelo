<?php

namespace Agoratec\VueloAppBundle\Lib\Geo;

use Agoratec\VueloAppBundle\Lib\Geo\Point;

class Polygon {
    private $puntos;
    public static $SRID = '4326';
    
    private function __construct($ps) {
    	foreach ($ps as $i => $value) {
    		$puntos[$i]=new Point($value->lon,$value->lat);
		}
    }
    
    public function toGeoJson(){
    	foreach ($this->puntos as $i => $value) {
    		$ap[i]=array($value->lon,$value->lat);
		}
			
        $array = array("type" => "Polygon", "coordinates" => array ($ap));
				
		
				
        return \json_encode($array);
    }
    
    /**
     *
     * @return string 
     */
    public function toWKT() {
    	$wkt='SRID='.self::$SRID.';POLYGON(';
		foreach ($this->puntos as $i => $value) {
			if($i!=0){
				$wkt.=',';
			}
			$wkt.=$this->puntos[$i]->lon.' '.$this->puntos[$i]->lat;
		}
		$wkt.=')';
        return $wkt;
    }
    
    /**
     *
     * @param string $geojson
     * @return Point 
     */
    public static function fromGeoJson($geojson) 
    {
        $a = json_decode($geojson);
        //check if the geojson string is correct
        if ($a == null or !isset($a->type) or !isset($a->coordinates)){
            //throw PolygonException::badJsonString();
        }
        
        if ($a->type != "Polygon"){
            //throw PolygonException::badGeoType();
        } else {
        	foreach ($a->coordinates as $i => $value) {
        		$lat = $value[$i][0];
            	$lon = $value[$i][1];
				$ps[$i]=Point::fromLonLat($lon, $lat);
			}		
            
            return Polygon::fromPoints($ps);
        }
                
    }
    
    public static function fromPoints($ps)
    {
        return new Point($ps);        
    }
}