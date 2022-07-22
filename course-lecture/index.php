<?php

$val = 6;

echo $val++;
echo $val;
echo ++$val;

$y = strval('123');
var_dump($y);

$z = '12.34';
$newZ = floatval($z);
var_dump(($newZ));

echo '</br></br>';

$longText = "
Hello, I am Ted.
How are you today?
You are awesome!
";

echo nl2br($longText) . '</br>';



// long version
$myName = isset($name) ? $name : 'John';
echo $myName . '</br>';

// short version
$myName = $name ?? 'Ted';
echo $myName . '</br>';

$age = 20;
// short version again
$myAge = $age ?? 18;
echo $myAge . '</br>';

// default var value using coalescing
$myCity = "Already Set";

$myCity ??= 'Town';
echo $myCity . '</br>';

$userRole = 'sammy';

switch($userRole){
    case 'admin':
      echo 'admin';
      break;
    case 'editor':
      echo 'editor';
      break;
    case 'user':
      echo 'user';
      break;
    default:
      echo 'unknown user';
}

echo '</br>';

$fruits = ["orange", "apple", "pear"];

foreach($fruits as $index => $fruit){
    echo $index . ' ' . $fruit . '</br>';
}

$fruits = [
    "orange" => "orange", 
    "red" => "apple", 
    "green" => "pear"
];

foreach($fruits as $index => $fruit){
    echo $index . ' ' . $fruit . '</br>';
}

function sum(...$nums){
    echo "<pre>";
    var_dump($nums);
    echo "</pre>";
    
    $sum = 0;

    foreach($nums as $num){
        $sum += $num;
    }

    return $sum;
}

echo(sum(1,2,3,4,5)) . '</br>';

// using reduce to make a more efficient sum function
function sumReduce(...$nums){
    return array_reduce($nums, fn($prev, $curr) => $prev + $curr);
}

echo(sumReduce(1,2,3,4,5)) . '</br>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <script>
        let x = 5;
        console.log(x);
    </script>

</body>
</html>