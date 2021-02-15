<?php


namespace PsWs\Products\Domain;

use PsWs\Shared\Domain\ValueObject\StringValueObject;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class Ean13 extends StringValueObject
{

    const EAN13_NUMBERS = 13;

    public function __construct(string $value)
    {
        $this->checkEan($value);
        parent::__construct($value);
    }

    private function checkEan(string $value)
    {
        if(self::EAN13_NUMBERS != strlen($value)){
            throw new Ean13Exception( $value);
        }
    }

}