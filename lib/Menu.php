<?php
namespace romaninsh\menu;
abstract class Menu extends \View {

    public $swatch='light-ink';

    function init() {
        parent::init();
        $this->api->add('romaninsh/menu/Controller'); // if it's not there yet

    }


    /**
     * Adds a title to your menu.
     */
    function addTitle($title, $class='romaninsh/menu/Title') {

        $i = $this->add($class,null,null,
            array_merge($this->defaultTemplate(),['Title'])
        );


        $i->set($title);

        return $i;
    }

    function addItem($title, $action=null, $class='romaninsh/menu/Item') {

        $i = $this->add($class,null,null,
            array_merge($this->defaultTemplate(),['Item'])
        );

        if(is_array($title)) {

            if($title['badge']) {
                $i->add('View',null,'Badge')
                    ->setElement('span')
                    ->addClass('atk-label')
                    ->set($title['badge']);
                unset($title['badge']);
            }

        }

        if($action){
            if(is_string($action)){
                $i->template->set('url',$this->api->url($action));
            }else{
                $this->on('click',$action);
            }
        }

        $i->set($title);

        return $i;
    }

    function addMenu($title, $class='romaninsh/menu/Vertical') {
        if($class=='Horizontal')$class='romaninsh/menu/Horizontal';


        $i = $this->add('romaninsh/menu/Item',null,null,
            array_merge($this->defaultTemplate(),['Menu'])
        );

        if(is_array($title)) {

            /*
            // Allow to set custom classes on a element
            if($title['a']) {
                $this->setComponents($title['a'],'a');
                unset($title['a']);
            }
             */

        }
        $i->set($title);

        $m = $i->add($class,null,'SubMenu');


        return $m;
    }

    function addSeparator($class='romaninsh/Menu/Separator') {
        $i = $this->add($class,null,null,
            $this->defaultTemplate()+['Separator']
        );

        return $i;
    }

}
