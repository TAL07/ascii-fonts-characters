<?php 

namespace ASCII\Controller\Auth;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Manager\Manager;
use ASCII\Entity\User;


class AuthController extends Controller
{
   
    public function auth ()
    {
        try {

          // $this->response->addHeader("Location", "https://getbootstrap.com/docs/3.3/components/");
          // return $this->response;
          // exit;
          $model = new \stdClass();
          if (array_key_exists("user", $_SESSION)) {
              throw new \Exception("you are already logged");
          }
          if (
            !($mail = filter_input(INPUT_POST, "user_mail"))
          || !($pswd = filter_input(INPUT_POST, "user_pswd"))
          || !($token = filter_input(INPUT_POST, "token"))
          || $token !== $_SESSION["token"]) {
              throw new \RuntimeException();
          } else if (!($user = Manager::getDoctrine()
                          ->getRepository(User::class)
                          ->findOneBy(["userMail" => $mail]))) {
            throw new \OutOfBoundsException;
          }

          if (!password_verify($pswd, $user->getUserPswd())) {
            throw new \OutOfBoundsException;
          }

                 

          $_SESSION["user"] = [
            "userAgent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT"),
            "ip" => filter_input(INPUT_SERVER, "REMOTE_ADDR"),
            "time" => time(),
            "id" => $user->getUserId(),
            "level" => $user->getUserLevel()->getUserLevelName(),
        ] ;

        $model->success = "You're logged";
        //var_dump($_SESSION);
  // le bon password??
      //var_dump(password_verify($pswd, $user->getUserPswd()));
       
        } catch (\OutOfBoundsException $e) {
            $error = "Bad credentials";
        } catch (\RuntimeException $e) {
           
        } catch (\Throwable $e) {
            $error = $e->getMessage();

        } finally {
         
          $model->error = isset($error) ? $error : null;
          return $this->render("auth/auth", [
            "token" => $_SESSION["token"],
            "user" => array_key_exists("user", $_SESSION)
                    ? $_SESSION["user"]["level"]
                    : null,
            "model" =>$model
            ]);

        }

        

          
          //   $user = $manager
          //   ->getRepository(User::class)
          //   ->findOneBy(["userMail" => $mail]);

          //   var_dump($user);

          //     die("je traite");
          // }
        
      }
      
    public function destroy () 
    {
      try {
        $model = new \stdClass();
        if (!array_key_exists("user", $_SESSION)) {
            throw new \Exception("you are still log out");
        }

        if ($_SESSION["token"] !== filter_input(INPUT_GET, "token")) {
            throw new \Exception ("You should not try"); 
        }

        // detruire la session
        session_destroy();
        // vide tableau des sessions
        $_SESSION = [];

    
        $model->success = "you are log out";
      } catch (\Throwable $e) {
        $model->error =$e->getMessage();
      } finally {
        return $this->render("auth/destroy", [
          "model" => $model,
          "user" => array_key_exists("user", $_SESSION)
                    ? $_SESSION["user"]["level"]
                    : null,
          "token" => array_key_exists("user", $_SESSION)
                    ? $_SESSION["token"]
                    : null,

        ]);
      }
      
    
    }  
}

