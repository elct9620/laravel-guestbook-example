<?php

  class Comment extends Eloquent
  {
    public static $table = 'comments';
    public static $per_page = 5;

    public function user()
    {
      return $this->belongs_to('User');
    }
  }
