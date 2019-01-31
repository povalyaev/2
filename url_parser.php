<?php

function extract_domain($domain)
{
    if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function extract_subdomains($domain)
{
    $subdomains = $domain;
    $domain = extract_domain($subdomains);
    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');
    return $subdomains;
}

function urlParse($argv)
{
    $parseUrl = parse_url($argv);
    $sub = extract_subdomains($parseUrl['host']);
    
    if ($sub == true) {
        $host = str_ireplace($sub .'.','',$parseUrl['host']);
        $parseUrl += ['subdomain'=>"$sub"];
    } else {
        $host = str_ireplace($sub,'',$parseUrl['host']);
    }
    $domain = strstr($host, '.');
    $tld = ltrim(strstr($host, '.'), '.');
    $parseUrl += ['domain'=>"$host"];
    $parseUrl += ['tld'=>"$tld"];
    var_export($parseUrl);
}

urlParse($argv);
