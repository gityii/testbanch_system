<?php

namespace tests\codeception\unit\models;

use Yii;
use yii\codeception\TestCase;
use app\models\Model;
use Codeception\Specify;

class ModelTest extends TestCase
{
 use Specify;

 protected function tearDown()
 {
   parent::tearDown();
 }

 public function testModelString()
 {
   $model = new Model();

   $this->specify('model string function should return a string', function () use ($model) {
     expect('function should return string', $model->string())->string();
   });
 }

 public function testModelBoolean()
 {
   $model = new Model();

   $this->specify('model bool function should return a boolean opposite to boolean passed', function () use ($model) {
     expect('argument is true, result should be false', $model->bool(true))->false();
     expect('argument is false, result should be true', $model->bool(false))->true();
   });
 }

 public function testModelArray()
 {
   $model = new Model();

   $this->specify('comma seperated string should return array of items', function () use ($model) {
     expect('passing "dave,joe" should return array with ["dave","joe"]', $model->getArray("dave,joe"))->array(['dave','joe']);
     expect('execution with no argument should return empty array', $model->getArray())->array();
   });
 }

}

/*
string() – returns a string
bool() – returns a boolean opposite to the one passed to it
array() – returns an exploded comma separated string
*/