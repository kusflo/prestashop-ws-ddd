<?php

namespace PsWs\Products\Domain;

use PsWs\Shared\Domain\DomainError;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class Ean13Exception extends DomainError
{

    private string $ean13;

    public function __construct(string $ean13)
    {
        $this->ean13 = $ean13;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'ean13_is_not_13_chars';
    }

    protected function errorMessage(): string
    {
        return sprintf('The ean13 <%s> is not 13 characters', $this->ean13);
    }
}