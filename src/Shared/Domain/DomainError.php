<?php


namespace PsWs\Shared\Domain;


use DomainException;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/

abstract class DomainError extends DomainException
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;

    abstract protected function errorMessage(): string;

}