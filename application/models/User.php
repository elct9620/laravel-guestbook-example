<?php

  class User extends Eloquent
  {
    public static $table = 'users';

    public function comments()
    {
      return $this->has_many('Comment');
    }

  }
