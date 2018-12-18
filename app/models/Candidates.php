<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Candidates extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $position;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $date_of_birth;

    /**
     *
     * @var string
     */
    public $mothers_name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $phone_number;

    /**
     *
     * @var integer
     */
    public $zip_code;

    /**
     *
     * @var string
     */
    public $city;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $educational_institution;

    /**
     *
     * @var integer
     */
    public $year_of_completion;

    /**
     *
     * @var string
     */
    public $degree_of_qualification;

    /**
     *
     * @var string
     */
    public $specialization_teaching_subjects;

    /**
     *
     * @var string
     */
    public $company_name;

    /**
     *
     * @var string
     */
    public $company_type;

    /**
     *
     * @var string
     */
    public $period_start;

    /**
     *
     * @var string
     */
    public $period_end;

    /**
     *
     * @var string
     */
    public $function;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon_job");
        $this->setSource("candidates");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'candidates';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Candidates[]|Candidates|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Candidates|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
