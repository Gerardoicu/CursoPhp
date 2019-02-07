<?php
class foo {
    var $bar = 'Soy bar.';
    var $arr = array('Soy A.', 'Soy B.', 'Soy C.');
    var $r   = 'Soy r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->bar . "\n";
echo $foo-> {$baz[1]} . "\n";

$start = 'b';
$end   = 'ar';
echo $foo->{$start . $end} . "\n";

$arr = 'arr';
echo $foo->$arr[1] . "\n";
echo $foo->{$arr[1]} . "\n";

?>