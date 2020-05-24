<?php
return [
  'admin' => [
    'name' => 'Admin',
    'permissions' => [
      'create_user',
      'create_course',
      'create_lesson',
      'block_user',
      'update_user'
    ]
  ],
  'teacher' => [
    'name' => 'Teacher',
    'permissions' => [
      'create_course',
      'create_lesson'
    ]
  ],
  'student' => [
    'name' => 'Student',
    'permissions' => [
    ]
  ]
];
