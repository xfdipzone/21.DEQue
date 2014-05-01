<?php

require "DEQue.class.php";

# 例子1

$obj = new DEQue(); // 前后端都可以输入，无限长度

$obj->frontAdd('a'); // 前端入列
$obj->rearAdd('b');  // 后端入列
$obj->frontAdd('c'); // 前端入列
$obj->rearAdd('d');  // 后端入列

// 入列后数组应为 cabd

$result = array();

$result[] = $obj->rearRemove(); // 后端出列
$result[] = $obj->rearRemove(); // 后端出列
$result[] = $obj->frontRemove(); // 前端出列
$result[] = $obj->frontRemove(); // 前端出列

print_r($result); // 出列顺序应为 dbca

# 例子2
$obj = new DEQue(3, 5); // 前端只能输出，后端可输入输出，最大长度5

$insert = array();
$insert[] = $obj->rearAdd('a');
$insert[] = $obj->rearAdd('b');
$insert[] = $obj->frontAdd('c'); // 因前端只能输出，因此这里会返回false
$insert[] = $obj->rearAdd('d');
$insert[] = $obj->rearAdd('e');
$insert[] = $obj->rearAdd('f');
$insert[] = $obj->rearAdd('g'); // 超过长度，返回false

var_dump($insert);

# 例子3
$obj = new DEQue(6); // 输出依赖输入

$obj->frontAdd('a');
$obj->frontAdd('b');
$obj->frontAdd('c');
$obj->rearAdd('d');

$result = array();
$result[] = $obj->rearRemove();
$result[] = $obj->rearRemove();  // 因为输出依赖输入，这个会返回NULL
$result[] = $obj->frontRemove();
$result[] = $obj->frontRemove();
$result[] = $obj->frontRemove();

var_dump($result);

?>