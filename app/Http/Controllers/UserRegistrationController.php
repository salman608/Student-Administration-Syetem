<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Batch;
use App\Section;

class UserRegistrationController extends Controller
{
    public function ShowRegistrationForm()
    {
        if (Auth::user()->role == 'Admin') {
            $batches=Batch::latest()->get();$batches=Batch::latest()->get();
            return view('admin.user.registration',compact('batches'));
        } else {
            return back();
        }
    }

    public function bringSection(Request $request){
      $section=Section::where([
        'batch_id'=>$request->id,
      ])->get();
      return view('admin.studentreg.bring_section',compact('section'));
    }

    public function userSave(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $users = User::all();
        return view('admin.user.user-list', compact('users'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:11', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {


        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'batch_id' => $data['batch_id'],
            'section_id' => $data['section_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userList()
    {

        if (Auth::user()->role == 'Admin') {
            $users = User::orderBy('created_at')->get();
            return view('admin.user.user-list', compact('users'));
        } else {
            return back();
        }
    }

    public function userProfile($userId)
    {
        $user = User::find($userId);
        return view('admin/user/user-profile', compact('user'));
    }

    public function changeUserInfo($id)
    {
        $user = User::find($id);
        return view('admin.user.change-user-info', compact('user'));
    }

    public function userInfoUpdate(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:11', 'max:255'],
            
        ]);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->save();
        return redirect("/user-profile/$request->user_id")->with('message', 'Profile update successfull');
    }

    public function changeUserAvatar($id)
    {
        $user = User::find($id);
        return view('admin.user.change-user-avatar', compact('user'));

    }

    public function userImageUpdate(Request $request)
    {
        $user = User::find($request->user_id);
        $file = $request->file('avatar');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/avatar/';
        $imageUrl = $directory . $imageName;
        // $file->move($directory, $imageName);
        Image::make($file)->resize(300, 300)->save($imageUrl);
        $user->avatar = $imageUrl;
        $user->save();
        return redirect("/user-profile/$request->user_id")->with('message', 'Profile update successfull');

    }
}
