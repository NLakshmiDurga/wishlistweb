<?php
class Item extends CI_Model {

        public function get_models()
        {
                $new_array[]=array('id' => 1,"title"=>"Tooth past" );
                $new_array[]=array('id' => 2,"title"=>"Coffe" );
                return $new_array;

        }

}

?>