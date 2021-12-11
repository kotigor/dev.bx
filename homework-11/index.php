<?php

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/",  $class) . '.php';
});


/*$advertisement = (new \Entity\Advertisement())
	->setBody("test")
	->setTitle("test")
	->setDuration(10);

$calculator = new \Service\AdvCalculator($advertisement);
$calculator->applyCost();

$calculator = new \Decorator\VatCostDecorator($calculator);
var_dump($calculator->applyCost()->getTotalCost());*/

$formatter = new \Decorator\DefaultFormatter();
$formatter = new Service\FormatterDecorator\HeaderAdvFormatterDecorator($formatter);
$formatter = new Service\FormatterDecorator\FooterAdvFormatterDecorator($formatter);

$text = 'Объявление';

echo $formatter->format($text);