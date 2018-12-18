<?php

use Phalcon\Http\Request;
use Phalcon\Filter;
//use form
use App\Forms\PersonalDataForm;

class PersonalDataController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $this->view->form = new PersonalDataForm();
    }

    public function addAction() {

//        $candidates = new Candidates();
//        $request = new Request();
//        $filter = new Filter();
        $form = new PersonalDataForm();
        // Check request
        if (!$this->request->isPost()) {
            return $this->response->redirect('personalData');
        }

        //check form validation
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







        $position = $this->request->getPost('position');
        $name = $this->request->getPost('name', ['trim', 'string']);
        $date_of_birth = $this->request->getPost('date_of_birth', ['trim', 'string']);
        $mothers_name = $this->request->getPost('mothers_name', ['trim', 'string']);
        $phone_number = $this->request->getPost('phone_number', ['trim', 'string']);
        $email = $this->request->getPost('email', ['trim', 'email']);
        $zip_code = $this->request->getPost('zip_code', ['trim', 'string']);
        $city = $this->request->getPost('city', ['trim', 'string']);
        $address = $this->request->getPost('address', ['trim', 'string']);

        //set session
        $this->session->set("position", "$position");
        $this->session->set("name", "$name");
        $this->session->set("date_of_birth", "$date_of_birth");
        $this->session->set("phone_number", "$phone_number");
        $this->session->set("mothers_name", "$mothers_name");
        $this->session->set("email", "$email");
        $this->session->set("zip_code", "$zip_code");
        $this->session->set("city", "$city");
        $this->session->set("address", "$address");


       $this->response->redirect('studies');
//     Store and check for errors
//        $success = $user->save(
//                [
//            'position' => $position,
//            'name' => $name,
//            'date_of_birth' => $date_of_birth,
//            'mothers_name' => $mothers_name,
//            'phone_number' => $phone_number,
//            'email' => $email
//                ], [
//            'position',
//            'name',
//            'date_of_birth',
//            'mothers_name',
//            'phone_number',
//            'email'
//                ]
//        );
//        if ($success) {
//            return $this->response->redirect('studies');
//        } else {
//
//            $this->flashSession->error('nem sikerult: ');
//
//            $messages = $user->getMessages();
//
//            foreach ($messages as $message) {
//                echo $message->getMessage(), '<br/>';
//            }
//        }
//
//        $this->view->disable();
    }

}
