<?php

    print_r( $_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        echo "Clau: " . $key . "<br/>";

        $es_array = ( gettype($value) == "array" );

        if ($es_array){
            echo "Valor: ";
            foreach ($value as $v){
                echo "$v, ";
            }
            } else {
                echo "Valor: " . $value;
            }
        }

?>