<?php

/**
 * CTModuleForm (child of CTForm)
 */
class CTModuleForm extends CTForm {

  public function __construct($modulename) {
    global $config;
    
    parent::__construct("AdminForm_$modulename", "admin_saveSettings");
    
    if ($m = readConf($modulename. "_name")) {
      
      $this->addField($modulename. "_inmenu", "", "CHECKBOX", t("add.to.menu", $m))
         ->setValue(readConf($modulename . "_inmenu", "0"));
      
      $this->addField($modulename. "_startbutton", "", "CHECKBOX", t('show.as.button.on.home', $m))
        ->setValue(readConf($modulename . "_startbutton", "0"));
      
      $this->addField($modulename. "_sortcode", "", "INPUT_REQUIRED", t('sortnumber.in.menu'))
        ->setValue(readConf($modulename . "_sortcode", "0"));
    }
  }

  public function render() {
    $this->addButton(t('save'), "ok");
    
    return parent::render();
  }

}