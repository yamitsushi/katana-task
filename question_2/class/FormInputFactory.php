<?php
class FormInputFactory {
  private $type;
  private $attributes;
  private $name;
  private $row;

  function __construct($type, $attributes) {
    $this->type = $type;
    $this->attributes = $attributes;
    $this->name = null;
    $this->row = null;
  }

  function create($type, $attributes = null) {
    return new FormInputFactory($type, $attributes);
  }

  function setName($name) {
    $this->name = $name;
    return $this;
  }

  function setRows($row) {
    $this->row = $row;
    return $this;
  }

  function write() {
    $html = "";
    if($this->type == "textArea") $html.=  "<textarea";
    else $html.= "<input type=\"" . $this->type . "\"";

    if($this->attributes != null)
      foreach($this->attributes as $key => $item) {
        $html.= " " . $key . "=\"" . $item . "\"";
      };

    $html.= " name=\"" . $this->name . "\"";

    if($this->row != null)
      $html.= " rows=\"" . $this->row . "\"";

    if($this->type == "textArea") $html.= "></textarea>";
    else $html.= "/>";

    return $html;
  }
}
