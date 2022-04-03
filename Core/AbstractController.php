<?php 

namespace Core;

Abstract class AbstractController 

{
    protected string $modelName = "";
    protected $model = "";

    public function __construct()
    {
        if (!empty($this->modelName)) {
            $this->model = new $this->modelName();
        }
    }
}