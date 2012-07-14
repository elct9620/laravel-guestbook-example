<?php

class Home_Controller extends Base_Controller {

  public $restful = true;

	public function get_index()
	{

    $comments = Comment::order_by('created_at', 'desc')->paginate();

    return View::make('home.index')
                 ->with('comments', $comments);
	}

  public function post_index()
  {
    $inputs = Input::all();
    $rules = array(
      'subject' => 'required',
      'content' => 'required'
    );

    $validation = Validator::make($inputs, $rules);

    if( $validation->fails() ) {
      return Redirect::home()->with_errors($validation);
    }

    Comment::create(array(
      'subject' => $inputs['subject'],
      'content' => $inputs['content']
    ));

    return Redirect::home();
  }

}

