<?php
namespace romaninsh\menu;
class Item extends \View {

    function init() {
        parent::init();

        $this->addComponents(array('swatch'=>$this->owner->swatch));
    }

    function set($data){
        if(is_array($data)){
            if($data['icon2']){

                $this->add('Icon',null,'Badge')->set($data['icon2']);
            }
            unset($data['icon2']);
        }


        return parent::set($data);
    }

    function addItem() {
        throw $this->exception('Do not chain addItem calls, the return individual objects');
    }

}
