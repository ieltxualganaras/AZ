<?php

class Administracion_Form_ClienteForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Cliente');
        
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre')->setRequired()->setErrorMessages(array('* requerido'))
                ->setAttrib('class', 'form-control');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')->setRequired()->addValidator(new Zend_Validate_EmailAddress())
                ->setAttrib('class', 'form-control');
        
        $telefonos = new Zend_Form_Element_Text('telefonos');
        $telefonos->setLabel('Telefonos')
                ->setAttrib('class', 'form-control');
        
        $sitio = new Zend_Form_Element_Text('sitio');
        $sitio->setLabel('Sitio')
                ->setAttrib('class', 'form-control');
        
        $otros = new Zend_Form_Element_Textarea('otros');
        $otros->setLabel('Otros')
                ->setAttrib('class', 'form-control');
        
        $submit = new Zend_Form_Element_Submit('Crear');
        $submit->setAttrib('class', 'btn btn-primary');
        
        $this->setElements(array($nombre,$email,$telefonos,$sitio,$otros,$submit));
        
        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit->setDecorators(array('ViewHelper',
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('emptyrow' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $this->setDecorators(
                array(
                    "FormElements",
                    array("HtmlTag", array("tag" => "table")),
                    "Form"
                )
        );
    }


}

