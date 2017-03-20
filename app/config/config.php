<?php
return [
  'dev_mode'=> true,
  'database'=>
  [
      'driver'   => 'pdo_mysql',
      'user'     => 'root',
      'password' => 'root',
      'dbname'   => 'test',
  ],
  'twig'=>
  [
      'cache' => APP_ROOT.'/cache'
  ]
];