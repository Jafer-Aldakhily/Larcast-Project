<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    # invoke function using when you create single action 
    # controller and do not need to call method name every where you use the controller.

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try{

            $newsletter->subscribe(request('email'));

        }catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list'
            ]);
        }

        return redirect('/')
        ->with('success' , 'You are now signed up for our newsletter!');
        }


}
