<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Radio;
//validation
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Date as DateValidator;

class StudiesForm extends Form {

    public function initialize() {


        //form name field
        $educational_institution = new Text(
                'educational_institution', [
            "class" => "form-control",
            "placeholder" => "Ide irja az oktatási intézményt"
                ]
        );

        $educational_institution->setDefault($this->session->get('educational_institution'));



        //form name field validation
        $educational_institution->addValidator(
                new PresenceOf(['message' => 'Az oktatási intézményt meg kell adni',])
        );


        //form date_of_birth field
        $year_of_completion = new Text(
                'year_of_completion', [
            "class" => "form-control",
            "placeholder" => "Ide irja a befejezés évét"
                ]
        );

        //form date_of_birth field validation
        $year_of_completion->addValidator(
                new PresenceOf(['message' => 'A befejezés évét meg kell adni',])
        );

        $year_of_completion->addValidator(new DateValidator(
                [
            "format" => "Y-m-d",
            "message" => "Nem helyes a formátum(éééé-hh-nn)",
                ]
                )
        );

        $year_of_completion->setDefault($this->session->get('year_of_completion'));





        $attr = array(
            'name' => 'degree_of_qualification'
        );

        $radio1 = new Radio("radio1", $attr);
        $radio2 = new Radio("radio2", $attr);
        $radio3 = new Radio("radio3", $attr);
        

        
        //form date_of_birth field
        $specialization_teaching_subjects = new TextArea(
                'specialization_teaching_subjects', [
            "class" => "form-control",
                ]
        );

        $specialization_teaching_subjects->setDefault($this->session->get('specialization_teaching_subjects'));







        $submit = new Submit(
                'submit', [
            "Továb",
            "class" => "btn btn-primary"
                ]
        );

        $back = new Submit(
                'back', [
            "Vissza",
            "class" => "btn btn-primary"
                ]
        );


        $this->add($educational_institution);
        $this->add($year_of_completion);
        
        
        $this->add($radio1);
        $this->add($radio2);
        $this->add($radio3);
        
        
//        $this->add($degree_of_qualification);

        $this->add($back);
        $this->add($specialization_teaching_subjects);
        $this->add($submit);
    }

}
