<?php

class PanelGroupField extends BaseField {

  static public $assets = array(
    'css' => array(
      'panelgroup.css'
    )
  );

  public function result() {
    return null;
  }

  public function label() {
    return ($this->label) ? ('<h2>' . html($this->label) . '</h2>') : '';
  }

  public function content() {
    if ($this->position() == 'end') {
      return '</div>';
    } else {
      return '<div class="field-group">' . $this->label();
    }
  }

  public function template() {
    return $this->content();
  }

}