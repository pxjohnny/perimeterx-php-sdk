<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Perimeterx\Perimeterx;

/**
 * @param \Perimeterx\PerimeterxContext $pxCtx
 */
function pxCustomUserIP($pxCtx)
{
    $ip = $_SERVER['X-MYHER-USER-IP'];
    $pxCtx->setIp($ip);
}

/**
 * @param \Perimeterx\PerimeterxContext $pxCtx
 */
function pxCustomBlockHandler($pxCtx) {
    $block_score = $pxCtx->getScore();
    $block_uuid = $pxCtx->getUuid();

    /* user defined logic comes here */
    error_log('px score for user is ' . $block_score);
};

$perimeterxConfig = [
    'app_id' => 'PX_APP_ID',
    'cookie_key' => 'COOKIE_SECRET',
    'auth_token' => 'AUTH_TOKEN',
    'blocking_score' => 70,
    'module_mode' => Perimeterx::$MONITOR_MODE_ASYNC
];

$px = Perimeterx::Instance($perimeterxConfig);
$px->pxVerify();
?>
Hello from PX
