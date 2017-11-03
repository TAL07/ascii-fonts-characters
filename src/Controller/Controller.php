<?php

namespace ASCII\Controller;

use ASCII\Http\Response;

abstract class Controller
{
    
   protected $response;
    
    public function __construct()
    {
       $this->response = new Response;
       session_start();
       if(!array_key_exists("token", $_SESSION)) {
        $_SESSION["token"] = password_hash(uniqid(), PASSWORD_DEFAULT);
        } else if(array_key_exists("user", $_SESSION)
            && $_SESSION["user"]["ip"] !== filter_input(INPUT_SERVER,"REMOTE_ADDR")
            && $_SESSION["user"]["userAgent"] !== filter_input(INPUT_SERVER,"HTTP_USER_AGENT")
        ) {
            die("Do not try to rob a user session");
           
        }
    } 
    
    private function getTemplateName (string $template): string 
    {
        return __DIR__ . "/../../app/views/". $template . ".php";
    }
   
    protected function redirect () 
    {
        if( !($_SESSION["user"]["level"]) == "superadmin"
        && !($_SESSION["user"]["level"] == "admin")) {
           
            // redirection directe vers page accueil
            $this->response->addHeader("location" , "/formation-php/web/auth?action=auth");
            return $this->response;
            
        } 
    }

    
    protected function render(string $template, array $data): Response
    {
        $fileName = $this->getTemplateName($template);
        if (is_file($fileName)) {
            extract($data);
           ob_start();
            include $fileName;
            $output = ob_get_contents();
            ob_end_clean();
            $this->response->setBody($output);
            return $this->response;
        }
        throw new \Exception("Template: " . $template . " is not a file");
        // si on met antislash devant exception pas besoin de mettre le use car on sort ainsi du namespace
   }
   
}