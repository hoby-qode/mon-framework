<?php 

namespace App\Controller\Frontend;

class PagesController extends FrontendController
{
    public function home($request)
    {
        $name = 'teste';
        $this->render('home',[
            'request' => $request,
            'name' => $name
        ]);
    }
    public function about($request)
    {
        dump($request);
    }
    public function contact($request)
    {
    }
}