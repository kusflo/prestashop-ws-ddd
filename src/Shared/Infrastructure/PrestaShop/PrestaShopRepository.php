<?php


namespace PsWs\Shared\Infrastructure\PrestaShop;


use PrestaShopWebservice;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
abstract class PrestaShopRepository
{
    protected bool $debug;
    protected array  $options = [];
    protected PrestaShopWebservice $webService;

    public function __construct(bool $debug)
    {
        $this->webService = new PrestaShopWebservice($_ENV['PS_SHOP_PATH'], $_ENV['PS_WS_AUTH_KEY'], true);
    }

    protected function blankXml()
    {
        $url = $_ENV['PS_SHOP_PATH'] . '/api/' . $this->options['resource'] . '?schema=blank';
        return $this->webService->get(['url' => $url]);
    }

}