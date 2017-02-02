<?php
namespace Vctls\Adldap2Bundle\DependencyInjection;


use Adldap\Adldap;
use Adldap\Connections\Provider;

class Adldap2Factory
{
    public static function createConnection(array $config)
    {
        $ad = new Adldap();
        $ad->addProvider('default', new Provider($config));
        $ad->connect('default');

        return $ad;
    }
}