<?php 

namespace App\Controller\Backend;

class ServiceController extends BackendController
{
    public function lists($request)
    {
        $this->render('service',$request);
    }
    public function add($request)
    {
    }
    public function edit($request)
    {
    }
}