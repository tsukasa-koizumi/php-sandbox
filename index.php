<?php
/**
 *  PHP Sand Box
 */
/* 初期化 */
// マルチバイト
mb_language('Japanese');
mb_internal_encoding('UTF-8');
mb_http_output("UTF-8");
mb_regex_encoding("UTF-8");

if (isset($_GET['phpinfo'])) {
    phpinfo();
    exit;
}

$workspaceDir = realpath(dirname(realpath(__FILE__)) . "/..");
set_include_path($workspaceDir . '/Libs' . PATH_SEPARATOR . get_include_path());
//require_once 'Zend/Loader.php';
//Zend_Loader::registerAutoload();
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(true); 
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>PHP Sand Box</title>
    <style>
div#frame {
    width: 65ex;
}
h1 {
    font-size: 150%;
    margin: 0.3em 0;
}
h2 {
    font-size: 100%;
    margin: 0.3em 0;
}
p {
    margin: 0.3em 0;
}
p#button {
    text-align: right;
}
textarea, pre {
    font-family: monospace;
}
    </style>
</head>
<body>
<div id="frame">
    <h1>PHP Sand Box</h1>
    <h2>実行結果</h2>
    <hr>
    <pre><?php eval(@$_POST['source']);?></pre>
    <hr>
    <form method="post">
        <p id="textarea"><textarea name="source" cols="80" rows="20"><?php echo htmlspecialchars(@$_POST['source']); ?></textarea></p>
        <p id="button"><button type="submit">実行</button> <button type="reset">リセット</button> <a href=""><button type="button">クリア</button></a></p>
    </form>
</div>
</body>
</html>