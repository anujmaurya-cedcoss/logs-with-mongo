<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function IndexAction()
    {
        // redirected to view
    }

    public function registerAction()
    {
        // creating a new user, with name and email obtained by post method
        $result = $this->mongo->users->insertOne($_POST);

        $success = $result->getInsertedCount();
        if ($success > 0) {
            $this->response->redirect('/login/');
        } else {
            $this->response->redirect('/signup/');
        }
    }
}
