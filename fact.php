<?php

// $num=5;

// $fact=1;


// for($i=1; $i<=$num; $i++){

//     $fact=$fact*$i;

// }

//     echo "Factorial:".$fact;


function fact($num){
    
    if($num<2){
        return 1;
    }
    else{
        return($num*fact($num-1));
    }
}
echo fact(5);
?>