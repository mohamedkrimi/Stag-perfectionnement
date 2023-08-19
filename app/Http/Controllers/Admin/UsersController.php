<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::where(['is_deleted'=> 0])->orderBy('id','desc')->get();
        return view('admin.users.index', compact(['users']));
    }
    public function active( Request  $request)
    {
        $model = User::findOrFail($request->id);
        $model->update(['is_blocked' => 1]);
       return response()->json(['result' => true]);

    }
    public function blocked(Request  $request)
    {

        $model = User::findOrFail($request->id);
        $model->update(['is_blocked' => 0]);
       return response()->json(['result' => true]);

    }
    public function destroy( $id)
    {

         $model = User::find($id);
        // return response()->json(['result' =>  $id,'status'=> $id]);
       $model->update(['is_deleted' => 1]);
       return response()->json(['result' => true]);

    }
    public function updatePasswordUser( Request  $request)
    {

        $model = User::findOrFail($request->id);
        $password = Str::random(10);
        $details = [
            'title' => 'Ceci est un e-mail de récuperer Mot de passe',
            'body' => $password,
        ];
       Mail::to( $model->email)->send(new TestMail($details));
       $model->update(['password' => Hash::make($password)]);
       return response()->json(['result' => true]);

    }
}
