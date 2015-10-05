<?php

namespace ToxicLemurs\DomainHelper;

/**
 * Class DomainHelper
 * @package ToxicLemurs\DomainHelper
 */
/**
 * Class DomainHelper
 * @package ToxicLemurs\DomainHelper
 */
class DomainHelper
{
    /**
     * You can override the HTTP_HOST value by setting this value
     *
     * @var string
     */
    protected $serverName;

    /**
     * Constructor for DomainHelper
     */
    public function __construct()
    {
        $this->serverName = $_SERVER['HTTP_HOST'];
    }

    /**
     * Set the server name programatically
     *
     * @param string $serverName
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * Returns the domain name
     *
     * @return mixed
     */
    public function getDomainName()
    {
        return $this->findDomainName($this->serverName);
    }

    /**
     * Returns the sub domain name
     *
     * @param bool $explode
     *
     * @return string
     */
    public function getSubDomainNames($explode = false)
    {
        if (true === $explode) {
            return explode('.', $this->findSubDomains($this->serverName));
        }

        return $this->findSubDomains($this->serverName);
    }

    /**
     * Check if you are on your root domain
     *
     * @return bool
     */
    public function isRootDomain()
    {
        return empty($this->getSubDomainNames());
    }

    /**
     * Returns the current protocol
     *
     * @return string
     */
    public static function getProtocol()
    {
        return isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] . '://' : 'http' . '://';
    }

    /**
     * Check if the current request is secure
     *
     * @return bool
     */
    public function isSecure()
    {
        return strpos($this->getProtocol(), 's') !== false;
    }

    /**
     * Returns the domain name
     *
     * @param string $domain
     *
     * @return string
     */
    private function findDomainName($domain)
    {
        if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
            return $matches['domain'];
        } else {
            return $domain;
        }
    }

    /**
     * Returns a string of sub domains
     *
     * @param string $domain
     *
     * @return string
     */
    private function findSubDomains($domain)
    {
        $subDomains = $domain;
        $domain = $this->findDomainName($subDomains);

        $subDomains = rtrim(strstr($subDomains, $domain, true), '.');

        return $subDomains;
    }
}
