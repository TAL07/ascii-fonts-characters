<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\FontsModel;
use ASCII\Model\CharactersModel;

class CharactersFontsController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
//         echo "FontsController";
    }


    public function manage ()
    {
       
        $this->redirect();
    }

}