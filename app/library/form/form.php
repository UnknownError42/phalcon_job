<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

$form = new Form();

$form->add(
    new Text(
        'name',
        [
            'maxlength'   => 30,
            'placeholder' => 'Type your name',
        ]
    )
);

$form->add(
    new Text(
        'telephone'
    )
);


$form->add(
    new Text(
        'telephone'
    )
);

$form->add(
    new Text(
        'telephone'
    )
);

$form->add(
    new Text(
        'telephone'
    )
);

$form->add(
    new Select(
        'position',
        [
            'H' => 'Home',
            'C' => 'Cell',
            
            
        ]
    )
);

?>