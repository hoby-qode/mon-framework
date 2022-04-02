<?php 

namespace App\Controller\Frontend;

use App\Controller\Frontend\FrontendController;
use App\Entity\Service as ServiceEntity;
use App\Model\Service;

class ServiceController extends FrontendController
{
    protected string $modelName = Service::class;
    protected string $entitiesName = ServiceEntity::class;

    public function index()
    {
        $service = $this->model->findAll();
        $this->render('service',[
            'service' => $service
        ]);
    }
    public function single($request)
    {
        if (!empty($request['params']['slug'])) {

            $service = new Service();

            $slug = htmlspecialchars($request['params']['slug']);

            $results = $service->find($slug);

            $service = new ServiceEntity($results);
            $this->render('service', [
                'service' => $service
            ]);

        } else {
            $this->render('service');
        }
    }
}