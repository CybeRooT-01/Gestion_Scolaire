<?php
namespace App\Controllers;

class Controller
{
    public function json(array $data)
    {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    
    public function render(string $view, array $params = null)
    {
        ob_start();
        require_once __DIR__ . '/../views/' . $view;
        isset($params) ?? $params = extract($params);
        // $content = ob_get_clean();
        require_once __DIR__ . '/../views/layout.php';
    }
}
