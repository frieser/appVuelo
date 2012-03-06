<?php

namespace Agoratec\VueloAppBundle\Lib\Type;

use Agoratec\VueloAppBundle\Lib\Geo\Polygon;
use Doctrine\DBAL\Types\Type; 
use Doctrine\DBAL\Platforms\AbstractPlatform;



class PolygonType extends Type { 

	const POLYGON = 'polygon';
    
    /**
     *
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string 
     */
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'geography(POLYGON,'.Polygon::$SRID.')';
    }
    
    /**
     *
     * @param type $value
     * @param AbstractPlatform $platform
     * @return Polygon 
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return Polygon::fromGeoJson($value);
    }
    
    public function getName()
    {
        return self::POLYGON;
    }
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->toWKT();
    }
    
    public function canRequireSQLConversion()
    {
        return true;
    }
    
    public function convertToPHPValueSQL($sqlExpr, $platform)
    {
        return 'ST_AsGeoJSON('.$sqlExpr.') ';
    }
    
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return $sqlExpr;
    }

}