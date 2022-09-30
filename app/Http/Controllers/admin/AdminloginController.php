<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminloginController extends Controller
{
  public function admindashboard(Request $request)
  {
    return view('Admins.index');
  }

  public function profile()
  {
    $id = Session::get("admin_id");
    $a = DB::table("admin")->where("id", $id)->first();
    return view('Admins.profile')->with(["a" => $a]);
  }

  public function profileupdate(Request $request)
  {
    $id = Session::get("admin_id");
    $a = DB::table('admin')->where('id', $id)->first();
    $data = $request->all();
    if ($data['name'] != '' && $data['email'] != '') {

      if (@$data['image'] != '') {
        $name = $data['image']->getClientOriginalName();
        $t = time() . $name;
        $img = explode(".", $name);
        if ($img[1] == 'png' ||  $img[1] == "jpg" ||  $img[1] == "jpeg") {
          $data['image']->move(base_path('public\image'), $t);

          $list = DB::table('admin')->where('id', $id)->update(["name" => $data['name'], "email" => $data['email'], "profile_image" => $t]);

          $nm = DB::table('admin')->where("id", $id)->get()->toArray();
          $dd = $nm[0]->name;
          $photo = $request->input('oldimg');

          Session::put('admin_profile_image', $t);
          if ($photo != '') {
            if (file_exists('public/image/' . $photo)) {
              unlink('public/image/' . $photo);
            }
            Session::put('admin_name', $dd);
            return redirect()->back()->with('message', 'Update Successfully');
          }
        } else {
          return redirect()->back()->with('error', 'Invalid Image Type');
        }
      } else {
        $list = DB::table('admin')->where('id', $id)->update(["name" => $data['name'], "email" => $data['email']]);
        $nm = DB::table('admin')->where("id", $id)->get()->toArray();
        $dd = $nm[0]->name;
        Session::put('admin_name', $dd);
      }
      return redirect()->back()->with('message', 'Update Successfully');
    } else {
      return redirect()->back()->with('error', 'Please Fill All The Fileds');
    }
  }

  public function index(Request $request)
  {
    if (Session::has('admin_name')) {
      return view('Admins.index');
    } else {
      return view('Admins.login');
    }
  }

  public function adminlogin(Request $request)
  {
    //   $order=DB::table('product')
    // ->join('category', 'category.id', '=', 'product.cid')
    // ->orderBy('product.created_at','DESC')
    // ->get();

    $email = $request->Input('email');
    $password = $request->Input('password');
    $same = DB::table('admin')->where(['email' => $email])->count();
    $a = DB::table('admin')->where('email', $email)->first();

    if (($email != "") && ($password != "")) {
      if ($same > 0 && Hash::check($password, $a->password)) {
        session::put('admin_id', $a->id);
        session::put('admin_name', $a->name);
        session::put('admin_email', $a->email);
        session::put('admin_profile_image', $a->profile_image);
        return view('Admins.index')->with(['a' =>  $a]);
      } else {
        return redirect('login')->with('error', 'Email and Password has been wrong....');
      }
    } else {
      return redirect('login')->with('error', 'Email and Password Empty...');
    }
  }

  public function adminlogout()
  {
    Session()->forget('admin_id');
    Session()->forget('admin_name');
    Session()->forget('admin_email');
    Session()->forget('admin_profile_image');
    return redirect('login');
  }


  public function addregister(Request $request)
  {
    $data = $request->all();
    if (@$data['profile_image'] != '') {
      $name = $data['profile_image']->getClientOriginalName();
      $t = time() . $name;
      $img = explode(".", $name);
      if ($img[1] == 'png' ||  $img[1] == "jpg" ||  $img[1] == "jpeg") {
        $data['profile_image']->move(base_path('public\image'), $t);
        $ans = DB::table('admin')->insertGetId(["name" => $data['name'], "email" => $data['email'], "password" => Hash::make($data['password']), "profile_image" => $t]);
        return redirect()->back()->with('message', ' Register User Sucessfully!');
      } else {
        return redirect()->back()->with('error', 'Invalid Image Type');
      }
    } else {
      $ans = DB::table('admin')->insertGetId(["name" => $data['name'], "email" => $data['email'], "password" => Hash::make($data['password'])]);
      return redirect()->back()->with('message', '  Register User Sucessfully!');
    }
  }

  public function showuser()
  {
    $data=DB::table('admin')->get();
    return view('Admins.showuser')->with(["data"=>$data]);
  }

  public function deleteuser($id)
    {
        $data = DB::table('admin')->where('id', $id)->delete();
        return redirect()->back();
    }
}
