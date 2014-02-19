<?php
namespace romaninsh\menu;
class Controller extends \Controller_Addon {

    public $atk_version='4.3';

    public $addon_name='romaninsh/menu';

    /** Contains JavaScript widget */
    public $has_assets=true;

    function init() {
        parent::init();

        $this->addLocation(array(
            'template'=>'template'
        ));
    }
}
