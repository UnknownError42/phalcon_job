<?php

use Phalcon\Http\Request;
use Phalcon\Filter;
//use form
use App\Forms\SkillsForm;

class SkillsController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $this->view->form = new SkillsForm();
    }

    public function addAction() {

        $form = new SkillsForm();

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

        $educational_institution = $this->request->getPost('educational_institution', ['trim', 'string']);
        $year_of_completion = $this->request->getPost('year_of_completion');
        $degree_of_qualification = $this->request->getPost('degree_of_qualification', ['trim', 'string']);
        $specialization_teaching_subjects = $this->request->getPost('specialization_teaching_subjects', ['trim', 'string']);

        $this->session->set("educational_institution", "$educational_institution");
        $this->session->set("year_of_completion", "$year_of_completion");
        $this->session->set("degree_of_qualification", "$degree_of_qualification");
        $this->session->set("specialization_teaching_subjects", "$specialization_teaching_subjects");




        $this->response->redirect('workplaces');
    }

}
