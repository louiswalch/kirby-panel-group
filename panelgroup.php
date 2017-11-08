<?php

class PanelGroupField extends BaseField {

    static public $assets = array(
        'js' => array('panelgroup.js'),
        'css' => array('panelgroup.css')
    );

    public function result() {
        return null;
    }

    public function label() {

        if ($this->label) {
            return '<h2>' . html($this->label) . '<a href="#"><i class="fa fa-chevron-down"></i></a></h2>';
        }

    }

    public function content_start() {

        $class = ($this->is_accordion()) ? 'is-accordion' : '';

        return '<div class="field-group open '.$class.'" data-field="panelgroup" name="panelgroup" groupname="'.$this->label.'">'
        . $this->label()
        . '<div class="field-group-content">'
        . '<div class="field-group-content-border"></div>';

    }

    public function content_end() {

        return '</div></div>';

    }

    public function content() {

        if ($this->position() == 'end') {
            return $this->content_end();
        } else {
            return $this->content_start();
        }

    }

    public function template() {
        return $this->content();
    }

    protected function is_accordion() {

        if (isset($this->accordion) && is_bool($this->accordion)) {
            return $this->accordion;
        } 

        // Legacy support to misspelled variable.
        if (isset($this->accordian) && is_bool($this->accordian)) {
            return $this->accordian;
        } 

        return false;

    }

}