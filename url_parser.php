<?php

function get_domain($domain)
{
    if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function get_subdomains($domain)
{
    $subdomains = $domain;
    $domain = get_domain($subdomains);
    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');
    return $subdomains;
}

function urlParse($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
    $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
    $parseUrl = parse_url($url);
    $sub = get_subdomains($parseUrl['host']);
    
    	if ($sub == true) {
       	    $host = str_ireplace($sub .'.','',$parseUrl['host']);
            $parseUrl += ['subdomain'=>"$sub"];
    	} else {
            $host = str_ireplace($sub,'',$parseUrl['host']);
    	}

	if ($extension == true) {
	    $parseUrl += ['extension'=>"$extension"];
    	}

    $domain = strstr($host, '.');
    $tld = strstr($host, '.');
    $parseUrl += ['domain'=>"$host"];
    $parseUrl += ['tld'=>"$tld"];
    print_r(json_encode($parseUrl, 128));
    echo PHP_EOL;

   	 if (isset($parseUrl['query'])) {
	    $get_string = $parseUrl['query'];
	    parse_str($get_string, $get_array);
	    print_r(json_encode($get_array, 128));
	    echo PHP_EOL;
    	 }
    } else {
    	echo("$url is a not valid URL!") . PHP_EOL;
    }
}


	$opt = "u:";
	$ogopt = array(
        "url:",
	);
        $opts = getopt($opt, $ogopt);

	if ($opts) {
	foreach (array_keys($opts) as $opt) switch ($opt) 
	{
            case 'u':
            $url = $opts['u'];
            break;
            case 'url':
            $url = $opts['url'];
            break;
	}
	} else {
	    $url = $argv[1];
	}

 	urlParse($url);
