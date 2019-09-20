<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;


class NotificacionesController extends Controller
{

	function __construct(){
        $this->middleware('auth');  
    }



    public function index(){

    	if(request()->ajax()){
    		return auth()->user()->unreadNotifications;

    	}
    	
    	return view('notificaciones.index',[
    		'unreadNotifications' => auth()->user()->unreadNotifications,
    		'readNotifications' => auth()->user()->readNotifications

    	]);
    }

    public function read ($id){
    	DatabaseNotification::find($id)->markAsRead();
        
          if(request()->ajax()){
            return auth()->user()->unreadNotifications;

        }
    	return back();

    }
}
