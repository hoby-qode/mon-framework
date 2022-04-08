<?php 

namespace App\Controller\Backend;

use Model;
use Formr\Formr;
use App\Model\Service;
use Core\Framework\Manager;
use App\Entity\Service as ServiceEntity;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ServiceController extends BackendController
{
    protected string $modelName = Service::class;
    protected string $entitiesName = ServiceEntity::class;

    public function __construct()
    {
        $this->form = new Formr('bootstrap4');
    }

    public function lists($request)
    {
        dump($this->model->findAll());
        // $cache = new FilesystemAdapter();
        // $servicesCached = $cache->get('lists_service', function(ItemInterface $item){
        //     $item->expiresAfter(3600);
        //     return $this->model->findAll();
        // });
        $servicesCached = $this->model->findAll();
        $this->render('service/service',[
            'services' => $servicesCached
        ]);
    }
    public function add($request)
    {
        if ($this->form->submitted())
        {
            // get our form values and assign them to a variable
            $data = $this->form->validate('Name, Description, Slug');
            // show a success message if no errors
            if ($data) {
                $manager = new Manager();
                $services = new ServiceEntity($data);
                $manager->insertTo('service', $data);
            }
            if($this->form->ok()) {
                $this->form->success_message = "Thank you, {$data['name']}!";
            }
        }
        $this->render('service/service',[
            'form' => $this->form
        ]);
    }
    public function edit($request)
    {
        if ($request->attributes->get('route')['params']['id']) {
            $id = $request->attributes->get('route')['params']['id'];
        }
        $services = $this->model->find($id);
        dump($services);
        if ($this->form->submitted())
        {
            // get our form values and assign them to a variable
            $data = $this->form->validate('Name, Description, Slug');
            // show a success message if no errors
            if ($data) {
                $manager = new Manager();
                $services = new ServiceEntity($data);
                $manager->updateTo('service',$id, $data);
            }
            if($this->form->ok()) {
               $this->form->success_message = "Thank you, {$data['name']}!";
            }
        }
        $this->render('service/service',[
            'form' => $this->form
        ]);
    }
}