<?php 

namespace App\Controller\Backend;

use App\Model\Service;
use App\Entity\Service as ServiceEntity;
use Core\Framework\Manager;
use Formr\Formr;

class ServiceController extends BackendController
{
    public function lists(Service $service)
    {
        $services = $service->findAll();
        $this->render('service/service',[
            'services' => $services
        ]);
    }
    public function add($request)
    {
        $form = new Formr('bootstrap4');
        if ($form->submitted())
        {
            // get our form values and assign them to a variable
            $data = $form->validate('Name, Description, Slug');
            // show a success message if no errors
            if ($data) {
                $manager = new Manager();
                $services = new ServiceEntity($data);
                $manager->insertTo('service', $data);
            }
            if($form->ok()) {
                $form->success_message = "Thank you, {$data['name']}!";
            }
        }
        $this->render('service/service',[
            'form' => $form
        ]);
    }
    public function edit($request)
    {
        if ($request->attributes->get('route')['params']['id']) {
            $id = $request->attributes->get('route')['params']['id'];
        }
        $this->render('service/service',[
            'request' => $form
        ]);
    }
}