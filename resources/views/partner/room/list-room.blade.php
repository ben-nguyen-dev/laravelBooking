@extends('partner.master')
@section('title')
List Room
@endsection
@section('main')
    <!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
                        <li><a href="{{route('trangchu')}}" title="Home">Home</a></li> 
                        <li><a href="{{route('list-homestay')}}" title="list-homestay">Danh sách Homestay</a></li> 
                        <li>Danh sách phòng </li>                                    
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->	
				
				<section class="full">
					<h1 style="text-align: center; font-size: 3em;">Danh sách phòng của Homestay</h1>
					@if(Session::get('thongbao') == 'success')
						<i class="notify-success">{{Session::get('massage')}}</i>
					@endif					
					@if(Session::get('thongbao') == 'fail')
						<i class="notify-fail">{{Session::get('massage')}}</i>
					@endif
					@if(empty(Auth::user()->phone ))
						<div class="alert"><i class="alert-danger">Vui lòng cập nhật số điện thoại trước khi tạo phòng</i></div>
					@elseif(empty(Auth::user()->xaid))
						<div class="alert"><i class="alert-danger">Vui lòng cập nhật địa chỉ trước khi tạo phòng</i></div>
					@else 
					<div class="sort-by" style="width:98%">
						<ul class="sort custom" style="float: right">
							<li>Thêm phòng
								<a href="{{ route('addRoom',['id' =>$homestay_id]) }}" title="addRoom" class="add"></a>
							</li>
						</ul>
					</div>  
					@if(count($product) > 0)
					<div class="deals clearfix">
						<!--deal-->	
							@foreach($product as $productVal)
							<article class="one-fourth">
								<figure><a href="{{url('room-detail'.'?id='.$productVal->homestay->id)}}" title=""><img src="{{asset('public/'.$productVal->avatar)}}" alt="" width="270" height="152" /></a></figure>
								<div class="details">
									<h1>{{$productVal->homestay->name}}</h1>
									<span class="address"> Tên • <a title="tên phòng"  style="color:red ;font-size :12px" >{{$productVal->name}}</a></span>
									<span class="address">	Loại • <a title="loại phòng"  style="color:red ;font-size :12px" >{{$productVal->roomType->name}}</a></span>
									<span class="address status_room_custom" >Trạng thái  •  
										@if ($productVal->status == 1)                                    
											<a title="Sửa"  style="color:#32df5d ;font-size :12px" >Hiện</a>
										@elseif($productVal->status == 0)                                 
											<a href="" title="Sửa" style="color:red ;font-size :12px" >Ẩn</a>
										@endif
									</span>
									@if($productVal->discount != 0)
									<span class="rating like" style="margin-bottom : 10px">&nbsp;
											{{$productVal->discount}}%
									</span>
									@elseif($productVal->discount == 0)
									<span class="rating nosale" style="margin-bottom : 10px">&nbsp;
										No Sales
									</span>
									@endif
									<span class="price none-border">Thêm ảnh ({{$productVal->image->count()}})&nbsp; &nbsp;
										<em>                                
											<a href="{{route('UploadImageRoom',['id'=>$productVal->id])}}"><img src="partner/images/ico/plus.png" alt="" width="22" height="22" /></a>
										</em>
									</span>
									<span class="price none-border" style="border-top : none;">Giá phòng  <em>{{number_format( $productVal->prices,0,',','.' ) }}đ</em> </span>
									<span class="price"  style="border: none;margin : 0 auto"><label for="">Chỉnh sửa &nbsp; &nbsp;</label> 
										<em>                                
											<a href="{{url('partner/edit-list-room', ['id' => $productVal->id])}}"><img src="partner/images/ico/edit.png" alt="" width="16" height="16" /></a>
										</em>
									</span>
									<a href="{{route('delete_room', ['id' => $productVal->id])}}" title="Xóa" class="gradient-button delete" onclick="return confirm('Bạn muốn xóa phòng ?')">Xóa phòng</a>
								</div>
							</article>
							@endforeach
						<div class="bottom-nav">							
							<!--pager-->
								{{ $product->withQueryString()->links('vendor.pagination.custom') }}
							<!--//pager-->
						</div>
						<!--//deal-->
					</div>
					@else
					<div class="deals clearfix">
						<article class="one-fourth custom_one_fourth">
							<div class="alert"><i class="alert-danger">Chưa có phòng,Vui lòng tạo phòng</i></div>
						</article>
					</div>
					@endif
					@endif
                    
				</section>
				<!--//top destinations-->
				@if(count($roomrestore) > 0)
				<section class="full">
					<h1 style="text-align: center; font-size: 3em;">Danh sách phòng đã xóa</h1>
					<div class="deals clearfix">
						<!--deal-->
						@foreach($roomrestore as $ViewRoom)
						<article class="one-fourth">
							<figure><a title=""><img src="{{asset('public/'.$ViewRoom->avatar)}}" alt="" width="270" height="152" /></a></figure>
							<div class="details">
								<h1>{{$ViewRoom->homestay->name}}</h1>
								<span class="address"> Tên • <a title="tên phòng"  style="color:red ;font-size :12px" >{{$ViewRoom->name}}</a></span>
								<span class="address">	Loại • <a title="loại phòng"  style="color:red ;font-size :12px" >{{$ViewRoom->roomType->name}}</a></span>
								<span class="address status_room_custom" >Trạng thái  •  
									@if ($ViewRoom->status == 1)                                    
										<a title="Sửa"  style="color:#32df5d ;font-size :12px" >Hiện</a>
									@elseif($ViewRoom->status == 0)                                 
										<a href="" title="Sửa" style="color:red ;font-size :12px" >Ẩn</a>
									@endif
								</span>
								@if($ViewRoom->discount != 0)
								<span class="rating like" style="margin-bottom : 10px">&nbsp;
										{{$ViewRoom->discount}}%
								</span>
								@elseif($ViewRoom->discount == 0)
								<span class="rating nosale" style="margin-bottom : 10px">&nbsp;
									No Sales
								</span>
								@endif
								<span class="price none-border">Số lượng ảnh ({{$ViewRoom->image->count()}})&nbsp; &nbsp;
								</span>
								<span class="price none-border" style="border-top : none;">Giá phòng  <em>{{number_format( $ViewRoom->prices,0,',','.' ) }}đ</em> </span>
								<a href="{{route('Restore_Room', ['id' => $ViewRoom->id])}}" title="Restore" class="gradient-button delete" onclick="return confirm('Bạn muốn khôi phục phòng chứ ?')">Khôi phục</a>
							</div>
						</article>
						@endforeach
						<!--//deal-->
					</div>
				</section>
				@endif
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection
@section('script1')
@endsection