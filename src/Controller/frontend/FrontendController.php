<?php 

namespace App\Controller\Frontend;

use Core\Framework\AbstractController;

class FrontendController extends AbstractController
{
    public function render( $path, $variables ) :void
    {
        if (is_array($variables)) {
            extract($variables);
        }
        ob_start();
        require(FOLDER_VIEW.'/frontend/'.$path.'.html.php');
        $pageContent = ob_get_clean();

        require(FOLDER_VIEW.'frontend/structure/base.html.php');
    }
}