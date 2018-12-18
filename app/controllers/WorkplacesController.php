<?php

use Phalcon\Http\Request;
use Phalcon\Filter;
//use form
use App\Forms\WorkplacesForm;

class WorkplacesController extends \Phalcon\Mvc\Controller
{
    
    public function indexAction() {
        $this->view->form = new WorkplacesForm();
    }
    
    public function backAction() {
        $this->response->redirect('studies');

    }

    public function addAction() {
        
        $form = new WorkplacesForm();
        
        if (!$this->request->isPost()) {
            return $this->response->redirect('studies');
        }
        
                if (!$form->isValid($_POST)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flashSession->error($message);
//                 return $this->response->redirect('personal_data');
                // Forward flow to the index action
                $this->dispatcher->forward(
                        [
                            'controller' => $this->router->getControllerName(),
                            'action' => 'index',
                        ]
                );
                return;
            }

        }
        
        $company_name = $this->request->getPost('company_name', ['trim', 'string']);
        $company_type = $this->request->getPost('company_type');
        $period_start  = $this->request->getPost('period_start', ['trim', 'string']);
        $period_end = $this->request->getPost('period_end', ['trim', 'string']);
        $function = $this->request->getPost('function', ['trim', 'string']);
        
        $this->session->set("company_name", "$company_name");
        $this->session->set("company_type", "$company_type");
        $this->session->set("period_start", "$period_start");
        $this->session->set("period_end", "$period_end");
        $this->session->set("function", "$function");
        
        


        $this->response->redirect('skills');

}

}