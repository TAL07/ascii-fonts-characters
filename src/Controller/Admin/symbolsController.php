<?php 
namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\symbolsModel;


class symbolsController extends Controller
{

public function __construct()
{
    parent::__construct();
    //         echo "FontsController";
}

public function symbols (): Response
{
    $this->redirect(); 


    $model = new symbolsModel;
    $model->create(
        (string) filter_input(INPUT_POST, "symbols_name"),
        (string) filter_input(INPUT_POST, "symbols_value")
        );
    if (!isset($model->success) && !isset($model->error)) {
    $model->remove((string) filter_input(INPUT_GET, "symbol"));
    }
    
    $model->selectAll();
    
    return $this->render(
        "symbols/manageSymbols",
        [
            "model" => $model
        ]
        );
    
    
    
}



}
