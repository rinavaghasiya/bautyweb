<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function addproduct()
    {
      $category=DB::table('category')->get();
    
      return view('Admins.addproduct')->with(['category'=>$category]);
    }
  
    public function insertproduct(Request $request)
    {
      $admin=Session::get('admin_id');
      if ($request->isMethod('get')) 
      {
        return view('Admins.addproduct');
       }
       else
       {
        $data = $request->all();
        
          if(@$data['item_img'] !='')
          {
            $img=array();
            if($files=$request->file('item_img'))
            {
              foreach($files as $file)
              {
                $name=$file->getClientOriginalName();
                 $t=time().$name;
                // $t=time().".".$name;
                $img = explode(".",$t);
  
               $file->move(public_path('item_img'),$t ); 
                $image[]=$t;
              }
            }
          
            if($img [1] =='png' ||  $img [1] == "jpg" ||  $img [1] =="jpeg")
            {
              $ans=DB::table('product')->insertGetId(["cid"=>$data['category_id'],'admin_id'=>$admin,"title"=>$data['title'],"item_img"=>implode(",",$image),"description"=>$data['description']]);
                return redirect()->back()->with('message',' Item Insert Sucessfully!');
             }
             else
             {
               return redirect()->back()->with('error','Invalid Image Type');
             }
          }
          else
          {
           return redirect()->back()->with('error','Please Enter Item Images');
          }
      }
    }

    public function showproduct(Request $request)
    {
      $requestData = ['cname','title'];
      $search=$request->input('search');
    
        $data =DB::table('category')
        ->join('product','product.cid','=','category.id')
        ->where(function($q) use($requestData, $search) {
          foreach ($requestData as $field)
             $q->orWhere($field, 'like', "%{$search}%");
        })
        ->select('category.cname','product.*')
        ->orderBy('product.created_at','DESC')
        ->Paginate(7);
      
        // echo "<pre>";
        // print_r($data);
        // die();
      
      return view('Admins.product')->with(['data'=>$data,'search'=>$search]);
    }

//     public function showproductdetail($imageid)
//   {
  
//     $data=DB::table('product')
//     ->join('category','category.id','=','product.cid')
//     ->where("product.id",$imageid)
//     ->select('product.*','category.cname')
//     ->get();

//   // echo "<pre>";
//   // print_r($data);
//   // die();

//     return view('Admins.showproductdetail')->with(["data"=>$data]);  
//   }

  public function productdelete($id)
  { 
     $data=DB::table('product')->where('id',$id)->delete();   
     return redirect()->back();   
  }



  public function editproduct($id) 
  {
    $data = DB::table('product')->where('id',$id)->first();
    return view('Admins.editproduct')->with(['data'=>$data]);
  }

  public function editmyitem(Request $request) 
  {
    $time=date('Y-m-d H:i:s',time());
    $data= $request->all();
   
    $data = $request->all();

      if(@$data['image']!='')
      {
        $img=array();
        if($files=$request->file('image'))
        {
          foreach($files as $file)
          {
            $name=$file->getClientOriginalName();
            $img = explode(".",$name);
            $t=time().".".$img[1] ;
            if($img [1] =='png' ||  $img [1] == "jpg" ||  $img [1] =="jpeg")
            {
              $file->move(base_path('public/item_img'),$t ); 
              DB::table('product')->where('id',$data['id'])->update(["title"=>$data['title'],"item_img"=>$t,"description"=>$data['description'],'updated_at'=>$time]);
              

              $photo = $request->input('oldimg');

              if($photo!='')
              {
                if(file_exists('public/item_img/'.$photo))
                {
                 unlink('public/item_img/'.$photo);
                }
                else
                {
                  echo "file not exist";
                } 
              }
            }
            else
            {
              return redirect()->back()->with('error','Invalid Image Type');
            }
          }
           return redirect()->back()->with('message','Update Product Sucessfully!');
        } 
      }
      else
      {
        DB::table('product')->where('id',$data['id'])->update(["title"=>$data['title'],"description"=>$data['description'],'updated_at'=>$time]); 
        return redirect()->back()->with('message','Update Product Sucessfully!');
      }
  }

    public function addimage($id){
        $data = DB::table('product')->where('id',$id)->first();
        return view('Admins.addimage')->with(['data'=>$data]);
    }

  public function addimagedetail(Request $request)
  {
    $data = $request->all();

    if (@$request->file('pimage') != '') {
      if ($request->hasFile('pimage')) {
        $poster = $request->file('pimage');
        $pname = $poster->getClientOriginalName();
        $pimage = time() . $pname;
        $poster->move(public_path('pimage'), $pimage);
      }

      $ans = DB::table('productimage')->insert(['proid' => $data['pid'], 'ptitle' => $data['ptitle'], "pimage" => $pimage, 'des' => $data['des']]);
      return redirect()->back()->with('imagemessage', 'Insert Data Sucessfully!');
    } else {
      return redirect()->back()->with('imageerror', 'please select photo');
    }
  }


  public function showimage(Request $request)
  {
    $requestData = ['ptitle'];
    $search = $request->input('search');

    $data = DB::table('productimage')
      ->where(function ($q) use ($requestData, $search) {
        foreach ($requestData as $field)
          $q->orWhere($field, 'like', "%{$search}%");
      })
      ->orderBy('created_at', 'DESC')
      ->get();

    // echo "<pre>";
    // print_r($data);
    // die();

    return view('Admins.productimage')->with(['data' => $data, 'search' => $search]);
  }

  public function deleteimage($id)
  {
    $data = DB::table('productimage')->where('id', $id)->delete();
    return redirect()->back();
  }

  public function editproductimage($id){
    $data = DB::table('productimage')->where('id',$id)->first();
    return view('Admins.editproductimage')->with(['data'=>$data]);
}
  public function editimage(Request $request)
  {
    $time = date('Y-m-d H:i:s', time());
    $data = $request->all();

    if (@$request->file('pimage') != '') {

      if ($request->hasFile('pimage')) {
        $poster = $request->file('pimage');
        $pname = $poster->getClientOriginalName();
        $pimage = time() . $pname;
        $poster->move(public_path('pimage'), $pimage);
      }

      DB::table('productimage')->where('id', $data['id'])->update(["ptitle" => $data['ptitle'], "pimage" => $pimage, "des" => $data['des'], 'updated_at' => $time]);

      $photo = $request->input('oldimg');

      if ($photo != '') {
        if (file_exists('pimage/' . $photo)) {
          unlink('pimage/' . $photo);
        } else {
          echo "file not exist";
        }
      }

      return redirect()->back()->with('message', 'Update Product Sucessfully!');
    } else {

      DB::table('productimage')->where('id', $data['id'])->update(["ptitle" => $data['ptitle'], "des" => $data['des'], 'updated_at' => $time]);


      return redirect()->back()->with('message', 'Update Product Sucessfully!');
    }
  }








}
