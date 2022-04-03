<?php 

namespace App\Controller\Backend;

use Core\AbstractController;

class BackendController extends AbstractController
{
    public function render( $path, $variables ) :void
    {
        if (is_array($variables)) {
            extract($variables);
        }
        ob_start();
        require(FOLDER_VIEW.'/backend/'.$path.'.html.php');
        $pageContent = ob_get_clean();

        require(FOLDER_VIEW.'backend/structure/base.html.php');
    }
}