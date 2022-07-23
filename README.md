# THIS CODE

This code reflects the over 6 hour course titled [PHP for Absolute Beginners](https://www.youtube.com/watch?v=2eebptXfEvw) that was taught in December 2020.

This course was hosted by [Traversy Media](https://www.youtube.com/c/TraversyMedia) with guest instructor [Codeholic](https://www.youtube.com/c/TheCodeholic).

This code reflects not only the instruction, but also my work and notes that I took.

# PURPOSE

The purpose for me to attend this course is to:

1. Review of existing knowledge;

2. Re-inforce existing knowledge of PHP syntax and concepts

3. Learn something knew

# NOTES

## What is PHP

- PHP Hypertext Preprocessor
- Server side general-purpose scripting language
- Best suited for web dev
- Able to be embedded into HTML
- Intrepreted Language

## Why Learn

It has multi-purposes where the language can build anything from simple to complex websites to include CRM Portals and E-commerce systems.

PHP can create and work with REST APIs, and it works with almost all databases with the most common being MySQL.

PHP can create CMS such as WordPress, Drupal, Magento and OpenCart.

Some PHP frameworks are Laravel, Symfony, CodeIgniter, and Yii2.

## Not Good For

PHP is not the best to build real-time applications. It is better to use NodeJS for this.

In addition, PHP is not meant for AI or ML... best to use Python.

## Basic Refresher that you may have forgotten

### BOOLEANS and NULL

boolean FALSE and NULL will return empty. In other words:

```
$hasDog = true;

echo $hasDog <-- returns '1'>

$hasDog = false;

echo $hasDog <-- returns empty... NOT 0 like in JS >

$someVar = null;

echo $someVar <-- returns empty like a false boolean>
```

### DETERMINE VAR TYPES

use `gettype()` whereas JS uses `typeof()`

- `is_string($name);` // true (1) or false (empty)
- `is_int($age);` // true (1) or false (empty)
- `is_bool($hasDog);` // true (1) or false (empty)
- `is_double($height);` // true (1) or false (empty)
- `is_float(1.25);` // will show true
- `is_double(1.25);` // essentially same as 'is_float'
- `is_int(5);` // will show true
- `is_numeric("3.45")` // will implicitly coerce the string to a number and show true
- `is_numeric("3g.45");` // will show false because there is a string value (g) with the numbers

### CONVERSION OF VAR TYPE TO ANOTHER

prepend the var with parenthesis and data-type that you want to convert to

`strval()` // convert to a string
`intval()` // convert to an integer
`floatval()` // convert to float

examples:

```
$strNum = '12.34';
$num = floatval($strNum);
var_dump($num); // will output 'float' and the num 12.34

const x = strval(123);
```

### CHECK IF VAR IS DEFINED OR ARRAY HAS AN ELEMENT

`isset($name);`
`isset($fruits[3]);`

### CONSTANT VARS

`define('myVar', 'hello');` <-- takes two arguments... (1) var name; (2) value >

### INCREMENT OPERATOR

note how the position of `++` will affect output

```
$x = 5;
echo $x++; <-- will display the value THEN increment so the screen will show '5' even though value is now 6>
echo ++$x; <-- will increment THEN display to the screen >
```

### FORMATTING STRINGS and NUMBERS

`number_format()` // will take a number and handle where to place comma (,) and decimal(.)

the `number_format()` takes three (3) arguments

[link to string functions](https://www.php.net/manual/en/ref.strings.php)

[link to math functions](https://www.php.net/manual/en/ref.math.php)

### PRINTING MULTI-LINE TEXT

use the function `nl2br();` to display the line-breaks in a string

### KEEP HTML AND THEN DE-CODE... GOOD FOR SECURITY?

store using `htmlentities()` and then output using `html_entity_decode()`

## ARRAYS REVIEW

- `$fruits[] = 'new fruit';` // add to array
- `array_push($fruits, 'new fruit');` // add to array
- `array_pop($fruits);` // remove last item from array
- `explode(",", $someStr);` // converts string into an array; takes two (2) arguments
- `implode(" ", $someArr);` // converts array to string; takes (2) arguments
- `in_array("Apple", $fruits);` // searches array for item; takes 2 arguments
- `array_search("Apple", $fruits);` // searches for index of item in an array; takes 2 args
- `array_merge($arr1, $arr2);` // merges arrays into 1
- `[...$arr1, ...$arr2]` // a better way to merge arrays using the spread operator; only available in 7.4+
- `sort($fruits);` // sorts an array in ascending; takes an optional 2nd arg for sorting type flags
- `rsort($fruits);` // reverse sort

- `array_keys($person);` // will gather the keys of the array
- `array_values($person);` // will gather the values of the array

- [other helpful array functions](https://www.php.net/manual/en/ref.array.php)

### Array: Conditional Assignment

Option 1 uses if statement with `isset`:

```
if (!isset($person['address'])){
    $person['address] = 'unkown';
}
```

Option 2 (PHP 7.4+) uses coalescing:

`$person['address'] ??= 'unknown';`

### Array: sorting

`ksort($person);` // sort ascending by keys
`asort($person);` // sort ascending by values

## CONDITIONALS

### Ternary: long and short versions

```
$age = 20;

echo $age < 22 ? 'You are young' : 'You are old';

$myAge = $age

$myAge = $age ?? 18;

```

### Null coalescing operator

```
// long version
$myName = isset($name) ? $name : 'John' ?

// short version
$myName = $name ?? 'John';


```

### Switch

```
$userRole = 'admin';

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

```

## LOOPS

1. for
2. while
3. do - while
4. foreach

### LOOP OVER ARRAY WITH ITS OWN ASSOCIATIVE ARRAY

```
foreach ( $person as $key => $value ) {
    if( is_array($value) ) {
        echo $key . ' ' . implode(",", $value) . '</br>';
    } else {
        echo $key . ' ' . $value;
    }

}
```

## FUNCTIONS

- arrow functions only exists in 7.4+

- use 'three dot notation' to accept multiple arguments
- 'three dot notation' will be accepted as an array

example:

```
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
```

### Function: using reduce

```
function sumReduce(...$nums){
    return array_reduce($nums, fn($prev, $curr) => $prev + $curr);
}

echo(sumReduce(1,2,3,4,5)) . '</br>';
```

## DATE and TIME

see [PHP Doc on Dates](https://www.php.net/manual/en/function.date.php)

see [PHP Doc on Times](https://www.php.net/manual/en/function.time.php)

**parse date:**
`$parsedDate = date_parse('2022-07-21 09:00:00');`

- "date_parse" will return an array

**parse date from a different format:**

- see [date_parse_from_format](https://www.php.net/manual/en/function.date-parse-from-format.php)

- this will take 2 args

## INCLUDE v REQUIRE

include: will still execute the proceeding code even if there's an error in the preceding code.

require: code will not execute any of the proceeding code if there is an error in the preceding code.

include is good when the partial is NOT absolutely necessary for the web page. For example including a header or footer with an error, you could still display the rest of the page.

require is good when the code is absolutely necessary for the page to run. For example, use require when giving the page a functionality, such as running math, because, if there's an error, then it doesn't make sense to run the page.

## WORKING WITH FILE SYSTEM

1. Magic Constants: there are nine magic constants that change depending on where they are used.

- `echo __DIR__.`
- `echo __FILE__.`
- `echo __LINE--.`

- see [PHP Doc on Magic Constants](https://www.php.net/manual/en/language.constants.magic.php)

2. Create Directory

- `mkdir('test');` // will create in the current directory where the code is executing

3. Rename Directory

- `rename('test','test2');` // takes 2 args; first is the directory you want to target, and the second is the new name

4. Delete Directory

- `rmdir('test2');`

5. Read Files and Directories

- `file_get_contents('someFile.txt');`
- `scandir('./');`

- `file_get_contents()` is also used to read contents from a URL such as in a JSON file.

```
$contents = file_get_contents('https://jsonplaceholder.typicode.com/posts');

print_r($contents);
```

- if you want to convert JSON data into an associative array, then use `json_decode($yourJSON);`

- conversely, if you want to convert an array into JSON then you use `json_encode($yourArray);`

6. Check if File or Directory exists

- `file_exists('yourFile.txt');` // returns boolean

- `is_dir('someDir');` // returns boolean

7. Update (Edit) File Contents

- `file_put_contents('sample.txt', 'Some content');` // takes 2 args; first is the name of the file, and second is what you want to add.

- Know that if the file name is NOT exist, then the file will be created. Unless you want to overwritten an existing file. Then use `file_append()`.

- For more details about `file_put_contents()` see [PHP Doc](https://www.php.net/manual/en/function.file-put-contents.php)

- **NOTE**: For Updating, this instructor is using `file_put_contents()`. This is identical to what Instructor Brad Traversy used with the multiple step approach of `fopen()`, `fwrite()`, and `fclose()`.

See [PHP Doc on File System](https://www.php.net/manual/en/book.filesystem.php)

## Objective Oriented Programming (OOP)

What is a class? It is a template, a blue-print that creates an object.

What is an instance? Each created object is a new instance, which holds methods (functionalities) and properties.

Typically when you have a Class, it is contained within it's own separate file. Then you would `require_once()` the file in whatever file needs the code.

Since PHP 7.4, you can now specify the data-type for each propert (like Typescript)

Regarding specifying data-types, you can place a question-mark (?) in-front of the specified data-type and that will mean the property also accepts null values.

"public," private" and "protected" properties are [access modifiers](https://www.phptutorial.net/php-oop/php-access-modifiers/). PHP also has documentation under [Property Visiblity](https://www.php.net/manual/en/language.oop5.visibility.php)

use "setters" and "getters" when the property modifier is private. A private property is not set within the `__constructor` but within its own public function. To retrieve (or get) a private property, it also uses its own public function.

["static"](https://www.php.net/manual/en/language.oop5.static.php) property belongs to the Class and NOT the instance. Access the static property using the double-colon (::)

a ["constructor"](https://www.php.net/manual/en/language.oop5.decon.php) is used to handle value assignment to each property when the class is instantiated.

keyword `$this` within the `function __constructor()` refers to the instance variable

see code 'Person.php' for a visual break-down

## OOP: Inheritance

inheritance is a child of another class

inheritance 'inherits' the properties and methods of the parent

inheritance can have its own properties and methods outside of the parent

benefits allow using similar Class properties and methods without duplication within another Class

uses the same `function __constructor()` syntax as parent to include all properties (both parent and child)

properties unique to the parent must follow the `function __constructor()` with the `parent::__constructor()` to declare those parent specific properties separate from the child.

see code 'Student.php' for visual break-down

## cURL FUNCTIONS

'Client URL': allows you to use different protocols (HTTP/HTTPS, FTP/SFTP, POP3/IMAP) to transfer data between networks.

similar to JS using [`fetch`](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch) where `curl` is making **requests** and receiving **responses**, and `curl` allows you to submit a number of options such as **method** and **headers**.

a tool that allows you to remotely interact with other services (download files, upload files, passing authentication, etc.)

it uses the library called **libcurl** and the CLI called **curl**

while you can get remote content using `file_get_contents()`, sometimes this is blocked due to a security policy. And `file_get_contents()` cannot pass additional headers or POST information. This is where `curl` functions are used.

an important function when working with APIs

working with JSON and arrays, use `json_decode($someJSON)` to convert from JSON to an array... use `json_encode($someArray)` to convert from an array to JSON

see [PHP Doc on cURL Functions](https://www.php.net/manual/en/ref.curl.php)

### cURL: Important Functions

- `curl_init($url);`:initiates a cURL session with the network that you want to contact. This function accepts an argument, which is the url that you want to connect. Prior to PHP 8.0, it returned a resource. After PHP 8.0, it now returns an Object Class handle.
- `curl_setopt($handle, $option, $value)`: when you want to set some options on the resource / handle. This involves three (3) arguments... (1) what you want to set the option on, (2) the option that you are setting; and (3) the value to be set on the option
- `curl_setopt_array($handle, $optionsArray);`: when you have multiple [options](https://www.php.net/manual/en/function.curl-setopt.php) to set on the resource.
- `curl_exec($handle);`: executing the connection that returns a **result** as an array. It will automatically print to the screen unless you set option `CURLOPT_RETURNTRANSFER => TRUE`
- `curl_getinfo($handle, $option);`: returns an array with multiple information about the result / response. It accepts a **second argument** which is an option to specify what information you only want to return... such as `http_code`
- `curl_close($handle);`: when you are done with your connection, you need to close it. However, since PHP 8.0 and because you are now returning an Object, you no longer need to `curl_close` because cURL is not returning a resource. The handle is automatically closed whenever the Object is destroyed or when there are no more references to the Object.

### cURL: Create (POST) Data

1. set `$url = "http://yournetworkconnection.com"`
2. set `$postInfo = $arrayOfValues`
3. `curl_init()`
4. set `$options` which is an array of values

- `CURLOPT_URL => $url`
- `CURLOPT_RETURNTRANSFER => TRUE`
- `CURLOPT_POST => TRUE`
- `CURLOPT_HTTPHEADER => ['content-type: application/json']`
- `CURLOPT_POSTFIELDS => json_encode($postInfo)`

5. `curl_setopt_array($resource, $options);`
6. `$result = curl_exec($resource);`
7. `curl_close($resource);`
