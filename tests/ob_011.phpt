--TEST--
ob_brotli_handler
--SKIPIF--
<?php
if (!extension_loaded('brotli')) die('skip need ext/brotli');
if (false === stristr(PHP_SAPI, 'cgi')) die('skip need sapi/cgi');
if (version_compare(PHP_VERSION, '5.4.0', '<')) die('skip need version');
?>
--INI--
brotli.output_compression=0
--ENV--
HTTP_ACCEPT_ENCODING=br
--FILE--
<?php
ob_start('ob_brotli_handler', 3);
echo "hi\n";
echo "ho\n";
echo "hi\n";
echo "ho\n";
?>
--EXPECTF--
 �����-q �
--EXPECTHEADERS--
Content-Encoding: br
Vary: Accept-Encoding
