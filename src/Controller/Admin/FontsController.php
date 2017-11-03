<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\FontsModel;

class FontsController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
//         echo "FontsController";
    }
    
    public function read (): Response 
    {

        $this->redirect(); 

        $model = new FontsModel();
        $model->selectAll();
        return $this->render(
            "fonts/read",
            [
                "model" => $model
            ]
            );
    }
    
    public function create (): Response
    {
        $this->redirect();
            
         
        if ($_SESSION["user"]["level"] == "admin") {
            $this->response->addHeader("location" , "/formation-php/web/admin/fonts?action=read");
            return $this->response;
        }


        $model = new FontsModel();
        $model->create(
            (string) filter_input(INPUT_POST, "fonts_name"),
            (int) filter_input(INPUT_POST, "fonts_line_height")
            );
      //  var_dump($model);
        return $this->render(
            "fonts/create",
            [
                "model" => $model
            ]
            );
    }
    
    
}

