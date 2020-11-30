<?php
  require ("../vendor/jossmp/sunatphp/src/autoload.php");

$numero = $_REQUEST['numero'];

$company = new \Sunat\Sunat(true,true);
$search = $company->search($numero);

echo json_encode($search,true);
