<?php

namespace ToxicLemurs\DomainHelper;

/**
 * Class DomainHelper
 * @package ToxicLemurs\DomainHelper
 */
class DomainHelper
{
    private function findDomainName($domain)
    {
        if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
            return $matches['domain'];
        } else {
            return $domain;
        }
    }

    private function findSubDomains($domain)
    {
        $subDomains = $domain;
        $domain = $this->findDomainName($subDomains);

        $subDomains = rtrim(strstr($subDomains, $domain, true), '.');

        return $subDomains;
    }

    public function getDomainName()
    {
        return $this->findSubDomains($_SERVER['HTTP_HOST']);
    }

    public function getSubDomainName()
    {
        return $this->findDomainName($_SERVER['HTTP_HOST']);
    }
}