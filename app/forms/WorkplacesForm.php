<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Check;
//validation
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Date as DateValidator;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;

class WorkplacesForm extends Form {

    public function initialize() {






        //form company_name field
        $company_name = new Text(
                'company_name', [
            "class" => "form-control",
            "placeholder" => "Irja be a cég neve"
                ]
        );

        $company_name->setDefault($this->session->get('company_name'));

        //form company_name field validation
        $company_name->addValidator(
                new PresenceOf(['message' => 'A cég nevet meg kell adni',])
        );


        $company_type = new Select(
                'company_type', \CompanyType::find(), [
            'using' => [
                'id',
                'name',
            ],
            "class" => "form-control",
            'useEmpty' => true,
            'emptyText' => 'Válaszon egyet...',
            'emptyValue' => '',
                ]
        );
        $company_type->setDefault($this->session->get('company_type'));

        ;

        //form period_start field
        $period_start = new Text(
                'period_start', [
            "class" => "form-control",
            "placeholder" => "Ide irja a kezdési dátumot"
                ]
        );

        $period_start->setDefault($this->session->get('period_start'));

        //form period_start field validation
        $period_start->addValidator(
                new PresenceOf(['message' => 'A kezdési dátumot meg kell adni',])
        );

        $period_start->addValidator(new DateValidator(
                [
            "format" => "Y-m-d",
            "message" => "Nem helyes a formátum(éééé-hh-nn)",
                ]
                )
        );


        //form period_end field
        $period_end = new Text(
                'period_end', [
            "class" => "form-control",
            "placeholder" => "Ide irja a születési dátumát"
                ]
        );

        $period_end->setDefault($this->session->get('period_end'));

        //form date_of_birth field validation
        $period_end->addValidator(
                new PresenceOf(['message' => 'A vége dátumát meg kell adni',])
        );

        $period_end->addValidator(new DateValidator(
                [
            "format" => "Y-m-d",
            "message" => "Nem helyes a formátum(éééé-hh-nn)",
                ]
                )
        );

        //form date_of_birth field
        $function = new TextArea(
                'function', [
            "class" => "form-control",
                ]
        );

        $function->setDefault($this->session->get('function'));

        $submit = new Submit(
                'submit', [
            "Továb",
            "class" => "btn btn-primary"
                ]
        );

        $back = new Submit(
                'back', [
            "vissza",
            "class" => "btn btn-primary"
                ]
        );

        $values = array(1, 2, 3, 4, 5, 6);
        $group;
        for ($i = 0; $i < count($values); $i++) {
            $group = new Check("group" . $i, array(
                "name" => "group[]",
                "value" => $values[$i]
            ));
            $this->add($group);
        }

 
        $this->add($company_name);
        $this->add($company_type);
        $this->add($period_start);
        $this->add($period_end);
        $this->add($function);
        $this->add($submit);
        $this->add($back);
    }

}
