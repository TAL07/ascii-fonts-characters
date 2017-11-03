<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\charactersModel;

class CharactersController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
//         echo "FontsController";
    }
    
   
    public function manage (): Response
    {
         //var_dump($_SESSION);
         $this->redirect();
        $model = new charactersModel;
        $model->create(
            (string) filter_input(INPUT_POST, "characters_name"),
            (string) filter_input(INPUT_POST, "characters_value")
            );
       if (!isset($model->success) && !isset($model->error)) {
           $model->remove ((string) filter_input(INPUT_GET, "character"));
       }
        
       
        $model->selectAll();
        
        return $this->render(
            "characters/manage",
            [
                "model" => $model
            ]
            );
        
         
         
       
        
    
    // redirection
    // $this->response->addHeader("Location",
    //  "/formation-php/web/auth?action=auth");
    // return $this->response;
    }
    
}

