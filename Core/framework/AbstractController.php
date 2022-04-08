<?php 

namespace Core\Framework;

Abstract class AbstractController 
{
    protected string $modelName;
    protected $model;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }

}