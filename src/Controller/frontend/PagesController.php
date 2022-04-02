<?php 

namespace App\Controller\Frontend;

use App\Controller\Frontend\FrontendController;

class PagesController extends FrontendController
{
    public function home($request)
    {
        $this->render('home',$request);
    }
    public function about($request)
    {
    }
    public function contact($request)
    {
    }
}