<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Homestay;
use App\Province;
use App\Product;
use App\Utilities;
use App\RoomType;
class HomeStayController extends Controller
{
    public function getListHST()
    {
    	 $homestay= Homestay::all();
         $province= Province::all();
         // dd($homestay);
    	return view('admin.homestay.ListHT',['homestay'=>$homestay,'province'=>$province]);
    }
    public function getHomeStay($id)
    {
    	$product= Product::find($id);
    	$product=Product::where('homestay_id','=',$id)->get();
    	return view('admin.homestay.products',['product'=>$product]);
    }
    public function getEdit($id)
    {
    	 $homestay= Homestay::find($id);
    	return view('admin.homestay.edit',['homestay'=>$homestay]);
    }
    public function postEdit(Request $request,$id)
    {
    	
        $homestay= Homestay::find($id);
        $homestay->status= $request->status;  
        $homestay ->save();
        return redirect('admin/homestay/ListHT');
    
    }
    public function getDStienich()
    {
        $DStienich= Utilities::all();
        return view('admin.homestay.DStienich',['DStienich'=>$DStienich]);
    }
    public function getTienIch()
    {
    	$utilities= Utilities::all();
    	return view('admin.homestay.tienich',['utilities'=>$utilities]);
    }
    public function postTienIch(Request $request)
    {
    	$this->validate($request,
            [
                'name'=>'required|min:3|max:100',
                'status'=>'required'
            ],
            [
                'name.required'=>'Không được để trống tên tiện ích!',
                'name.min'=>'Tiêu đề quá ngắn ( từ 3 đến 100 kí tự !)',
                'name.max'=>'Tiêu đề quá dài ( từ 3 đến 100 kí tự !)',
                'status.required'=>'Hãy chọn trạng thái!'

            ]);
    	$utilities= new Utilities;
    	$utilities->name= $request->name;
    	$utilities->status= $request->status;
        $utilities->alias= Str::slug($request->name);
    	$utilities->created_at=now();
    	$utilities->updated_at=now();
    	$utilities->save();
    	return redirect('admin/homestay/tienich')->with('thongbao','Thêm tiện ích thành công !');
    }
    public function getEditTI($id)
    {
        $EditTI=Utilities::find($id);
        return view('admin.homestay.editTI',['EditTI'=>$EditTI]);
    }
    public function postEditTI(Request $request, $id)
    {
        $EditTI=Utilities::find($id);
        $EditTI->name= $request->name;
        $EditTI->status= $request->status;
        $EditTI->updated_at=now();
        $EditTI->save();
        return redirect('admin/homestay/DStienich');

    }
    public function getDelTI($id)
    {
        $dele=Utilities::find($id);
        $dele->delete();
        return redirect('admin/homestay/DStienich');
    }
    public function getDSRS()
    {
        $DSRS=RoomType::all();
        return view('admin.homestay.DSroomstyle',['DSRS'=>$DSRS]);
    }
     public function getRoomStyle()
    {
    	$roomstyle= RoomType::all();
    	return view('admin.homestay.roomstyle',['roomstyle'=>$roomstyle]);
    }
    public function postRoomStyle(Request $request)
    {
    	$this->validate($request,
            [
                'name'=>'required|min:3|max:100',
                'capacity'=>'required|min:1|max:50',
                'status'=>'required'
            ],
            [
                'name.required'=>'Không được để trống style phòng!',
                'name.min'=>'Tiêu đề quá ngắn ( từ 3 đến 100 kí tự !)',
                'name.max'=>'Tiêu đề quá dài ( từ 3 đến 100 kí tự !)',
                'capacity.required'=>'Nhập sức chứa!',
                'capacity.min'=>'Sức chứa phải lớn hơn 1!',
                'capacity.max'=>'Sức chứa phải nhỏ hơn 50!',
                'status.required'=>'Hãy chọn trạng thái!',

            ]);
    	$roomstyle= new RoomType;
    	$roomstyle->name= $request->name;
    	$roomstyle->capacity= $request->capacity;
    	$roomstyle->status= $request->status;
        $roomstyle->alias=Str::slug($request->name);
    	$roomstyle->created_at=now();
    	$roomstyle->updated_at=now();
    	$roomstyle->save();
    	return redirect('admin/homestay/roomstyle')->with('thongbao','Thêm tiện ích thành công !');
    }
    public function getDelRS($id)
    {
        $DEL=RoomType::find($id);
        $DEL->delete();
        return redirect('admin/homestay/DSroomstyle');
    }
}
