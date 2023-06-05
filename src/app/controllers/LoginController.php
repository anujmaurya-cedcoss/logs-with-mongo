<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function IndexAction()
    {
        // redirected to index
    }
    public function loginAction()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $this->mongo->users->findOne(['email' => $email, 'password' => $password]);
        if ($result['email'] == $email) {
            // credentials are correct
            $this->logger
                ->excludeAdapters(['error'])
                ->info('User Logged In : email => \''
                    . $result['email'] . '\' name => \'' . $result['name'] . '\'');
            echo "<h3>Logged In successfully</h3>";
            die;
        } else {
            // invalid credentials
            $this->logger
                ->excludeAdapters(['login'])
                ->info('unauthorized login attempt : email => \''
                    . $_POST['email'] . '\' password => \'' . $_POST['password'] . '\'');

            echo "<h3>Invalid Credentials</h3>";
            die;
        }
    }
}
