<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view( 'home' );
    }

    public function shoutHome() {
        //return view("shouthome");
        $userId = Auth::id();

        if(Friend::where('user_id',$userId)->where('friend_id',$userId)->count()==0){
            $friendship = new Friend();
            $friendship->user_id = $userId;
            $friendship->friend_id = $userId;
            $friendship->save();
        }

        //$status = Status::where( 'user_id', $userId )->orderBy( 'id', 'desc' )->get();
        $status = Auth::user()->friendsStatus;
        
        $avatar = empty( Auth::user()->avatar ) ? asset( 'images/avatar.jpg' ) : Auth::user()->avatar;
        return view( "shouthome", array( 'status' => $status, 'avatar' => $avatar ) );
    }

    public function publicTimeline( $nickname ) {
        //return view("shouthome");
        $user = User::where( 'nickname', $nickname )->first();
        if ( $user ) {
            $status = Status::where( 'user_id', $user->id )->orderBy( 'id', 'desc' )->get();
            $avatar = empty( $user->avatar ) ? asset( 'images/avatar.jpg' ) : $user->avatar;
            $name = $user->name;
            $displayActions = false;
            if ( Auth::check() ) {
                if ( Auth::user()->id != $user->id ) {
                    $displayActions = true;
                }
            }
            return view( "shoutpublic", array(
                'status'         => $status,
                'avatar'         => $avatar,
                'name'           => $name,
                'displayActions' => $displayActions,
                'friendId'       => $user->id,
            ) );
        } else {
            return redirect( '/' );
        }

    }

    public function saveStatus( Request $request ) {
        if ( Auth::check() ) {
            $status = $request->post( 'status' );
            $userId = Auth::id();

            $statusModel = new Status();
            $statusModel->status = $status;
            $statusModel->user_id = $userId;
            $statusModel->save();
            return redirect()->route( 'shout' );
        }
    }

    function saveProfile( Request $request ) {
        if ( Auth::check() ) {
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nickname = $request->nickname;

            $profileImage = 'user' . $user->id . '.' . $request->image->extension();
            $request->image->move( public_path( 'images' ), $profileImage );

            $user->avatar = asset( "images/{$profileImage}" );

            $user->save();
            return redirect()->route( 'shout.profile' );
        }
    }

    public function profile() {

        return view( 'profile' );
    }

    public function makeFriend( $friendId ) {
        $userId = Auth::user()->id;
        if ( Friend::where( 'user_id', $userId )->where( 'friend_id', $friendId )->count() == 0 ) {
            $friendship = new Friend();
            $friendship->user_id = $userId;
            $friendship->friend_id = $friendId;
            $friendship->save();
        }

        if ( Friend::where( 'friend_id', $userId )->where( 'user_id', $friendId )->count() == 0 ) {
            $friendship = new Friend();
            $friendship->friend_id = $userId;
            $friendship->user_id = $friendId;
            $friendship->save();
        }

        return redirect()->route( 'shout' );
    }

    public function unFriend( $friendId ) {
        $userId = Auth::user()->id;
        Friend::where( 'user_id', $userId )->where( 'friend_id', $friendId )->delete();
        Friend::where( 'friend_id', $userId )->where( 'user_id', $friendId )->delete();

        return redirect()->route( 'shout' );
    }
}
