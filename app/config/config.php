<?php
return [
  'dev_mode'=> true,
  'database'=>
  [
      'driver'   => 'pdo_mysql',
      'user'     => 'root',
      'password' => 'root',
      'dbname'   => 'test',
      'charset'  => 'utf8',
      'driverOptions' => array(
          1002 => 'SET NAMES utf8'
      )
  ],
  'twig'=>
  [
      'cache' => APP_ROOT.'/cache'
  ]
];