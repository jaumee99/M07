<?php
$i = 12;
$a = 1.234;
$b = False;
$c = "abc";
$gettype = "gettype";

$tipus_de_i = gettype( $i );
$tipus_de_a = gettype( $a );
$tipus_de_b = gettype( $b );
$tipus_de_c = gettype( $c );
$tipus_de_gettype = gettype( $gettype );

echo "La variable \$i 
      conté el valor $i 
	  i és del tipus $tipus_de_i<br>";

echo "La variable \$a 
      conté el valor $a 
        i és del tipus $tipus_de_a<br>";

echo "La variable \$b 
      conté el valor $b 
        i és del tipus $tipus_de_b<br>";

echo "La variable \$c 
      conté el valor $c 
        i és del tipus $tipus_de_c<br>";

echo "La variable \$gettype 
      conté el valor $gettype 
        i és del tipus $tipus_de_gettype";
?>