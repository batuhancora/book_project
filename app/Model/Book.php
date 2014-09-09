<?php

App::uses('AppModel','Model');

class Book extends AppModel{
  public $belongsTo = array('Writer','Publisher');
}