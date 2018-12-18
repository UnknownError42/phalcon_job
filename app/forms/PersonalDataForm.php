<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Select;
//validation
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Date as DateValidator;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;

class PersonalDataForm extends Form {

    public function initialize() {


        $position = new Select(
                'position', \Position::find(), [
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
        $position->setDefault($this->session->get('position'));



        //form name field
        $name = new Text(
                'name', [
            "class" => "form-control",
            "placeholder" => "Ide irja a nevét"
                ]
        );
        $name->setDefault($this->session->get('name'));

        //form name field validation
        $name->addValidator(
                new PresenceOf(['message' => 'A nevet meg kell adni',])
        );

        //form date_of_birth field
        $date_of_birth = new Text(
                'date_of_birth', [
            "class" => "form-control",
            "placeholder" => "Ide irja a születési dátumát"
                ]
        );

        $date_of_birth->setDefault($this->session->get('date_of_birth'));

        //form date_of_birth field validation
        $date_of_birth->addValidator(
                new PresenceOf(['message' => 'A születési dátumot meg kell adni',])
        );

        $date_of_birth->addValidator(new DateValidator(
                [
            "format" => "Y-m-d",
            "message" => "Nem helyes a formátum(éééé-hh-nn)",
                ]
                )
        );

        //form mothers_name field
        $mothers_name = new Text(
                'mothers_name', [
            "class" => "form-control",
            "placeholder" => "Ide irja az anyja nevét"
                ]
        );

        $mothers_name->setDefault($this->session->get('mothers_name'));

        //form mothers_name field validation
        $mothers_name->addValidator(
                new PresenceOf(['message' => 'Az anyja nevét meg kell adni',])
        );

        //form email field
        $email = new Text(
                'email', [
            "class" => "form-control",
            "placeholder" => "Ide irja az email cimét"
                ]
        );
        $email->setDefault($this->session->get('email'));

        //for email field validation
        $email->addValidator(
                new PresenceOf(
                [
            'message' => 'Az emailt meg kell adni',
                ]
                )
        );

        $email->addValidator(
                new Email(
                [
            'message' => 'Az email cim nem helyes',
                ]
                )
        );

        $phone_number = new Text(
                'phone_number', [
            "class" => "form-control",
            "placeholder" => "Ide irja a telefonszámát"
                ]
        );
        $phone_number->setDefault($this->session->get('phone_number'));

        //form phone_number field validation
        $phone_number->addValidator(
                new PresenceOf(['message' => 'A telefonszámot meg kell adni',])
        );

        $phone_number->addValidator(
                new StringLength(
                [
            'messageMinimum' => 'A telefonszám túl rövid',
            'min' => 11,
                ])
        );

        $phone_number->addValidator(
                new Regex(
                [
            'message' => 'Nem helyes a formátum +36 XXXXXXXX',
            'pattern' => '/\+36 [0-9]+/',
                ]
                )
        );


        $zip_code = new Text(
                'zip_code', [
            "class" => "form-control",
            "placeholder" => "Ide irja az irányítószámát"
                ]
        );
        $zip_code->setDefault($this->session->get('zip_code'));


        $city = new Text(
                'city', [
            "class" => "form-control",
            "placeholder" => "Ide irja a várost"
                ]
        );
        $city->setDefault($this->session->get('city'));

        $address = new Text(
                'address', [
            "class" => "form-control",
            "placeholder" => "Ide irja az utcát és a házszámot"
                ]
        );
        $address->setDefault($this->session->get('address'));


        $submit = new Submit(
                'submit', [
            "Továb",
            "class" => "btn btn-primary"
                ]
        );


        $this->add($position);
        $this->add($name);
        $this->add($date_of_birth);
        $this->add($mothers_name);
        $this->add($email);
        $this->add($phone_number);
        $this->add($zip_code);
        $this->add($city);
        $this->add($address);
        $this->add($submit);
    }

}
