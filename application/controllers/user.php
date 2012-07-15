<?php

  class User_Controller extends Base_Controller
  {
    public $restful = true;

    public function get_new()
    {
      return View::make('user.new');
    }

    public function post_new()
    {
      $inputs = Input::all();
      $rules = array(
        'username' => 'required|unique:users|alpha_num',
        'password' => 'required|min:6',
        'password_confirm' => 'required|same:password'
      );

      $validation = Validator::make($inputs, $rules);

      if( $validation->fails() ) {
        return Redirect::to('user/new')->with_errors($validation);
      }

      User::create(array(
        'username' => $inputs['username'],
        'password' => Hash::make($inputs['password'])
      ));

      return Redirect::home();

    }

    public function get_profile()
    {
      return View::make('user.profile');
    }

    public function post_profile()
    {

    }

    public function get_login()
    {
      return View::make('user.login');
    }

    public function post_login()
    {
      $inputs = Input::all();
      $credentials = array(
        'username' => $inputs['username'],
        'password' => $inputs['password']
      );

      if( !Auth::attempt($credentials) ){
        return Redirect::home();
      }

      return Redirect::to('session/login');
    }

    public function get_logout()
    {
      Auth::logout();
      return Redirect::home();
    }

  }
