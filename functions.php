<?php

function translit_path($value)
{
	$converter = array(
		'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
		'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
		'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
		'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
		'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
		'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
		'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
	);
 
	$value = mb_strtolower($value);
	$value = strtr($value, $converter);
	$value = mb_ereg_replace('[^-0-9a-z\.]', '-', $value);
	$value = mb_ereg_replace('[-]+', '-', $value);
	$value = trim($value, '-');    
 
	return $value;
}
 
function translit_url($url)
{
	$url = parse_url(trim($url));
	if (!empty($url['host'])) {
		$res = '';
		if (!empty($url['scheme'])) {
			$res .= $url['scheme'] . '://';
		}
		if (!empty($url['host'])) {
			$res .= idn_to_ascii($url['host']);
		}
		if (!empty($url['port'])) {
			$res .= ':' . $url['port'];
		}
		if (!empty($url['path'])) {
			$path = explode('/', $url['path']);
			foreach ($path as $i => $row) {
				if (preg_match('/[а-яё]/iu', $row)) {
					$path[$i] = translit_path($row);
				}
			}
	
			$res .= implode('/', $path);
		}
		if (!empty($url['query'])) {
			$res .= '?' . $url['query'];
		}
		if (!empty($url['fragment'])) {
			$res .= '#' . $url['fragment'];
		}
		
		return $res;
	} else {
		return translit_path($url["path"]);
	}
}
