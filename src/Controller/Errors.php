<?php 

namespace App\Controller;

class Errors
{
    public function error404()
    {
        header('Status: 404');
        require FOLDER_VIEW.'errors/404.html';
    }
    public function error500()
    {
        header('Status: 500');
        require FOLDER_VIEW.'errors/500.html';
    }
    
}