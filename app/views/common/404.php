<?php

use App\Utils\ConstanteServer;
use App\Utils\SessionHelpers;

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';



ob_start();
new SessionHelpers();
?>
<div class="translate-y-1/3">
    <h1 class="font-black text-8xl text-center p-6">Erreur 404</h1>
    <p class="font-medium text-3xl text-center p-8">La ressource recherchée est introuvable</p>
</div>
<?php $content = ob_get_clean();
$layout_path = ConstanteServer::base_path_vues_common() . '/layout.php';
require_once $layout_path;
?>