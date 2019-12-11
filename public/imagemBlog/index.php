<?php

phpinfo();die;

$r= array();
$r['cnpj'] = "29182863000109";
$r['vencimento'] = strtotime("2019-06-01");
$contraChave    = md5(substr($r['cnpj'],-5));

$chave          = md5($r['vencimento'].$contraChave.$r['cnpj']);
 
echo date("Y-m-d", $r['vencimento']).chr(10);
echo $r['vencimento'].chr(10);
echo $chave;
