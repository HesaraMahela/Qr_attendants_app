<?php
declare(strict_types=1);
require 'validator.php';
require_once 'conn.php';



use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('./../vendor/autoload.php');

$options = new QROptions(
    [
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_MARKUP_SVG,
        'version' => 5,
    ]
);

$qrcode = (new QRCode($options))->render($_GET['lec-id']);

header('Content-type: image/png');

echo $qrcode;

exit;