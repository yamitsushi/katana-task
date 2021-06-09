<?php
include "class/FormInputFactory.php";


$html[] = FormInputFactory::create("text", ["class"=>"primary"])->setName("uname");

$html[] = FormInputFactory::create("textArea")->setRows(4)->setName("description");


foreach($html as $ii) {
  echo $ii->write() . "\n";
}