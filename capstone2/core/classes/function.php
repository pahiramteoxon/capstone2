<?php 
  include_once 'core/init.php';


function count_id(){

      static $count = 1;
      return $count++;
}


?>