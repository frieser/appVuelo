<?php

namespace Agoratec\VueloAppBundle\Lib\Geo;


class Point {
    private $lat;
    private $lon;
    public static $SRID = '4326';
    
    private function __construct($lon, $lat) {
        $this->lat = $lat;
        $this->lon = $lon;
    }
    
    public function toGeoJson(){
        $array = array("type" => "Point", "coordinates" => array ($this->lon, $this->lat));
        return \json_encode($array);
    }
    
    /**
     *
     * @return string 
     */
    public function toWKT() {
        return 'SRID='.self::$SRID.';POINT('.$this->lon.' '.$this->lat.')';
    }
    
    /**
     *
     * @param string $geojson
     * @return Point 
     */
    public static function fromGeoJson($geojson) 
    {
        $a = json_decode($geojson,true);
        //check if the geojson string is correct
        if ($a == null or !isset($a->type) or !isset($a->coordinates)){
        	return $geojson;
            //throw PointException::badJsonString();
        }
        
        if ($a->type != "Point"){
            //throw PointException::badGeoType();
        } else {
            $lat = $a->coordinates[0];
            $lon = $a->coordinates[1];
            return Point::fromLonLat($lon, $lat);
        }
                
    }
    
    public static function fromLonLat($lon, $lat)
    {
        
            return new Point($lon, $lat);
        
    }
}