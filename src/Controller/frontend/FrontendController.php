<?php 

namespace App\Controller\Frontend;

use Core\AbstractController;

class FrontendController extends AbstractController
{
    public function render( $path, array $variables = [] ) :void 
    {
        extract($variables);
        ob_start();
        require(FOLDER_VIEW.'/frontend/'.$path.'.html.php');
        $pageContent = ob_get_clean();

        require(FOLDER_VIEW.'frontend/structure/base.html.php');
    }
}