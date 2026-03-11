<?php
echo "<pre>";
function hr($title = '') {
    if ($title) echo "\n\n $title \n\n";
}

hr('Objects and classes');
"\n";
class Person {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
    
    public function greet(): string {
        return "Hi, I'm " . $this->name;
    }
}

$p = new Person('fencer');
echo $p->greet() . "\n\n";


hr('Arrays of objects and foreach');

$people = [new Person('fencer 2'), new Person('fencer 3')];

foreach ($people as $person) {
    echo $person->greet() . "\n";
}


hr('Useful functions: implode/explode, json encode/decode');

//  DEFINING VARIABLES BEFORE USING
$arr = ["a", "b", "c"];
$assoc = ["name" => "Praveen", "age" => 20];
$int = 18;

$csv = implode(',', $arr);
echo "CSV: $csv\n";

$back = explode(',', $csv);
var_dump($back);

$json = json_encode($assoc);
echo "JSON: $json\n";

var_dump(json_decode($json, true));


hr('Operators & ternary/null coalescing');

echo 'Ternary: ' . ($int > 15 ? 'big' : 'small') . "\n";
echo 'Null coalescing: ' . ($assoc['missing'] ?? 'default') . "\n";


hr('Conclusion');

echo "This file demonstrates PHP basics: functions, classes and objects.\n";
echo "<pre>";
?>