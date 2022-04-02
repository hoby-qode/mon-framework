<?php 

namespace Core;

Abstract class AbstractController 

{
    protected string $modelName;
    protected $model;
    protected $controller;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }
}