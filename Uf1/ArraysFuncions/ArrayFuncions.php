<?php
//1

$input = array(1, 2, 3, 4, 5);

$output = array_map("factorial", $input);
print_r($output);

function factorialArray($output){
    $output = array();
    foreach ($input as $a => $value) {
        $output[$a] = factorial($value);
    }
}

function factorial($n){
    if ($n == 1) {
        return 1;
    }

    return $n * factorial($n - 1);

}


//2

$n = 4;
echo "N = $n <br>";

$matriu = creaMatriu($n);

echo "Matriu".mostraMatriu($matriu);

function creaMatriu($num){
    $matriu;
    $row = 0;
    $col = 0;
    for ($i = 1; $i <= $num; $i++){
        for ($j = 1; $j <= $num; $j++){
            if ($col == $row) {
                $matriu[$col][$row] = "*";
                $row++;
            } elseif($col < $row) {
                $matriu[$col][$row] = $row+$col;
                $row++;
            } elseif($col > $row) {
                $matriu[$col][$row] = rand(10,20);
                $row++;
            }

        }
        $col++;
        $row = 0;
        
    }

    return $matriu;

}

function mostraMatriu($matriu)
{
    $string = "<table>";
    foreach ($matriu as $key => $value) {
        $string .= "<tr>";
        foreach ($value as $clau => $n) {
            $string .= "<td>" . $n . "</td>";
        }
        $string .= "</tr>";
    }
    $string .= "</table>";
    return $string;
}

?>