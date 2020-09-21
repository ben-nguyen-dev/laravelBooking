@extends("user.master")

@section('title')
Room Detail
@endsection

@section('script')
	$(document).ready(function() {
		
	});
@endsection
@section('scriptEnd')
	<script>
		function AddCart(id, homestay_id, datepicker1, datepicker2){
			$.ajax({
				url: '../add-cart/'+id,
				type: 'GET',
				data: {homestay_id: homestay_id, datepicker1:datepicker1, datepicker2:datepicker2}
			}).done(function(response){
				$('#change-item-cart').empty();
				$('#change-item-cart').html(response);
			});
		}
		function DelItem(id, homestay_id, datepicker1, datepicker2){
			$.ajax({
				url: '../delete-item-cart/'+id,
				type: 'GET',
				data: {homestay_id: homestay_id, datepicker1:datepicker1, datepicker2:datepicker2}
			}).done(function(response){
				$('#change-item-cart').empty();
				$('#change-item-cart').html(response);
			});
		}
		function Alert(){
			alert('Bạn hãy chọn thời gian để tìm được phòng phù hợp');
		}
	</script>
@endsection
@section('home')
class="active"
@endsection

@section('content')
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="{{route('userHomePage')}}" title="Home">Home</a></li>
						<li><a href="{{route('userSearch').'?address='.$homestayVal->province->name.$url}}" title="Address">{{$homestayVal->province->name}}</a></li>
						<li><a href="{{route('userSearch').'?address='.$homestayVal->district->name.' - '.$homestayVal->province->name.$url}}" title="Address">{{$homestayVal->district->name}}</a></li>
						<li>{{$homestayVal->name}}</li>                                    
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<!-- <ul class="top-right-nav">
						<li><a href="{{url('/')}}" title="Back to results">Trang chủ</a></li>
					</ul> -->
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						@foreach($homestayVal->image as $image)
							<img src="{{$image->url}}" alt="" width="850" height="531" />
						@endforeach
					</section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li class="availability"><a href="#availability" title="Availability">Phòng phù hợp</a></li>
							<li class="description"><a href="#description" title="Description">Mô tả</a></li>
							<!-- <li class="facilities"><a href="#facilities" title="Facilities">Cơ sỏ vật chất</a></li> -->
							<!-- <li class="location"><a href="#location" title="Location">Vị trí</a></li> -->
							<li class="reviews"><a href="#reviews" title="Reviews">Đánh giá</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					
					<!--availability-->
					<section id="availability" class="tab-content">
						<article>
							<h1>Còn {{$product->count()}} phòng có sẵn</h1>
							<div class="text-wrap">
								@if( isset($datepicker1) && isset($datepicker2) )
									<p>Phòng có sẵn từ <span class="date">{{$datepicker1}}</span> đến <span class="date">{{$datepicker2}}</span>.</p>
								@endif
							</div>
							<!-- <h1>Room types</h1> -->
							<ul class="room-types">
								@foreach($product as $productVal)
									<!--room-->
									<li>
										<figure class="left"><img src="{{$productVal->avatar}}" alt="" width="270" height="152" />
										<a href="{{$productVal->avatar}}" class="image-overlay" rel="prettyPhoto[gallery{{$productVal->id}}]"></a></figure>
										<div hidden>
											@foreach($productVal->image as $imageProduct)
												<a href="{{$imageProduct->url}}" class="image-overlay" rel="prettyPhoto[gallery{{$imageProduct->product_id}}]"></a></figure>
											@endforeach
										</div>
										<div class="meta">
											<p class="pro-name">{{ucfirst($productVal->name)}}</p>
											<h2 class="type-name">{{$productVal->roomType->name}}</h2>
											@if( $productVal->discount != 0 )
												<p>Giảm giá: <span class="discount">{{$productVal->discount}}%</span></p>
											@endif
											<p>Đã bao gồm 10% VAT </p>
											<p>Thanh toán tại homestay</p>
											<a href="javascript:void(0)" title="more info" class="more-info">+ Thêm</a>
										</div>
										<div class="room-information">
											<div class="row">
												<span class="first">Phù hợp:</span>
												<span class="second"><span class="capacity">{{$productVal->roomType->capacity}} x</span><img src="user/images/ico/person.png" alt="" /></span>
											</div>
											@if( $productVal->discount == 0 )
												<div class="row price">
													<span class="first">Giá: </span>
													<span class="second">{{ number_format( $productVal->prices,0,',','.' ) }}đ</span>
												</div>
											@else
												<div class="row price">
													<span class="first">Giá: </span>
													<span class="second price-old"><strike>{{ number_format( $productVal->prices,0,',','.' ) }}</strike>đ</span>
												</div>
												<div class="row price">
													<span class="first">&nbsp</span>
													<span class="second price-new">{{ number_format( $productVal->prices*(100-$productVal->discount)/100,0,',','.' ) }}đ</span>
												</div>
											@endif	
											@if( isset($datepicker1) && isset($datepicker2) )
												<a onclick="AddCart({{$productVal->id}}, {{$homestayVal->id}}, '{{$datepicker1}}', '{{$datepicker2}}')" class="gradient-button no-href">Chọn</a>
											@else
												<a onclick="Alert()" class="gradient-button no-href">Chọn</a>
											@endif
										</div>
										<div class="more-information">
											<p>{{$productVal->description}}</p>
											<p><strong>Tiện ích và đồ dùng:</strong></p>
											<div class="text-wrap utilities">	
												<ul class="three-col">
													@foreach($productVal->utilities as $utilitiesVal)
														<li>{{$utilitiesVal->name}}</li>
													@endforeach
												</ul>
											</div>
											<p><strong>Kích thước phòng:</strong>  {{$productVal->area}} m<sup>2</sup></p>
										</div>
									</li>
									<!--//room-->
								@endforeach
							</ul>
						</article>
					</section>
					<!--//availability-->
					
					<!--description-->
					<section id="description" class="tab-content">
						<article>
							<h1>Chung</h1>
							<div class="text-wrap">	
								<p>{{$homestayVal->description}}</p>
							</div>
							
							<h1>Giờ nhận phòng</h1>
							<div class="text-wrap">	
								<p>Từ 15:00 giờ </p>
							</div>
							
							<h1>Giờ trả phòng</h1>
							<div class="text-wrap">	
								<p>Trước 12:00 giờ </p>
							</div>
							
							<h1>Chính sách hủy phòng</h1>
							<div class="text-wrap">	
								<p>Chính sách hủy khác nhau tùy theo loại phòng. Vui lòng kiểm tra các <a href="user_terms_of_service.html">điều kiện phòng </a>khi chọn phòng của bạn. </p>
							</div>
							
							<h1>Chính sách giành cho trẻ em</h1>
							<div class="text-wrap">	
								<p><strong style="color:red;">Miễn phí!</strong> Với tất cả trẻ em dưới <strong style="color:#0005a0;">140</strong>cm.<br /><br />Tất cả trẻ em trên <strong style="color:#0005a0;">140</strong>cm đều được áp dụng chính sách dành cho người lớn<br /></p>
							</div>
							
							<h1>Thú cưng</h1>
							<div class="text-wrap">	
								<p>Thú cưng được chấp nhận. Phí có thể được áp dụng, hãy liên hệ với chủ nhà</p>
							</div>
						</article>
					</section>
					<!--//description-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
							<h1>Đánh giá của du khách</h1>
							<ul class="reviews">
								<!-- @if( isset($homestayVal->rating) ) -->
									@foreach($homestayVal->rating->where('status','1') as $ratingVal)
										<!--review-->
										<li>
											<figure class="left"><img src="{{$ratingVal->bill->user->avatar}}" alt="avatar" width=50 height=50/></figure>
											<address><span>{{$ratingVal->bill->user->name}}</span><br /><br />{{date( "d-m-Y", strtotime( $ratingVal->created_at ))}}</address>
											<div class="pro">
												<div class="stars">
													@for( $i=5-$ratingVal->point; $i--; $i >= 0 )
														<img src="user/images/ico/star-rating-off.png" alt="" />
													@endfor
													@for( $i=$ratingVal->point; $i--; $i >= 0 )
														<img src="user/images/ico/star-rating-on.png" alt="" />
													@endfor
												</div>
											</div>
											<div class="con"><p>{{$ratingVal->comment}}</p></div>
										</li>
										<!--//review-->
									@endforeach
								<!-- @elseif( !empty($homestayVal->rating) ) -->
									<!-- <h3>Chưa có đánh giá nào</h3> -->
								<!-- @endif -->
							</ul>
						</article>
					</section>
					<!--//reviews-->
				</section>
				<!--//hotel content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">
					<!--hotel details-->
					<article class="hotel-details clearfix">
						<h1>{{$homestayVal->name}}
							<span class="stars">
								<span class="point">{{$homestayVal->point}}</span>
							</span>
						</h1>
						<span class="address">{{$homestayVal->province->name}}</span><br/>
						<span class="address">{{$homestayVal->district->name}}</span>
						<div class="description">
							<p>{{$homestayVal->title}}</p>
						</div>
						<div class="image-item">
							<ul>
							@foreach($homestayVal->image as $image)
								<li>
									<img src="{{$image->url}}" alt="" width="50" height="50" />
									<a href="{{$image->url}}" class="image-overlay" rel="prettyPhoto[gallery2]"></a>
								</li>
							@endforeach	
							</ul>
						</div>
					</article>
					<!--//hotel details-->

					<!--Search-->
					<article class=" default clearfix search-left">
						<form action="{{route('userRoomDetail')}}">
							<input type="hidden" name="id" value="{{$homestayVal->id}}">
							<div class="row-2">
								<div class="f-item datepicker">
									<label for="datepicker1">Nhận phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" value="{{$datepicker1}}" id="datepicker1" name="datepicker1" /></div>
								</div>
								<div class="f-item datepicker">
									<label for="datepicker2">Trả Phòng</label>
									<div class="datepicker-wrap"><input type="text" placeholder="" value="{{$datepicker2}}" id="datepicker2" name="datepicker2" /></div>
								</div>
							</div>
							<div class="row-3">
								<div class="f-item spinner">
									<label for="num_room">Số phòng</label>
									<input type="text" placeholder="" min="1" value="{{$num_room}}" id="num_room" name="num_room" required="required"/>
								</div>
								<div class="f-item spinner">
									<label for="num_adult">Người lớn</label>
									<input type="text" placeholder="" value="{{$num_adult}}" id="num_adult" name="num_adult" required="required"/>
								</div>
								<div class="f-item spinner">
									<label for="num_chil">Trẻ em</label>
									<input type="text" placeholder="" value="{{$num_chil}}" id="num_chil" name="num_chil" required="required"/>
								</div>
							</div>
							<input type="submit" value="Tìm kiếm" class="search-submit" id="search-submit" />
						</form>
					</article>
					<!--//Search-->

					<!-- Booking?-->
					<article class="default clearfix order">
						<h2>Phòng đã chọn</h2>
						@if(Session::get('check-session') == 'fail')
							<p><i class="error_account">{{Session::get('massage')}}</i></p>
						@endif
						<div id="change-item-cart">
							@include('user.ajax.cart')
						</div>
						@if( isset($datepicker1) && isset($datepicker2) )
							<a href="{{route('userBookingStep1').'?id='.$homestayVal->id.'&address='.$homestayVal->province->name.$url}}" class="gradient-button" title="Book">Thanh toán</a>	
						@endif
					</article>
					<!--// Booking?-->

					<!--Popular hotels in the area-->
					<!--//Popular hotels in the area-->
					
					<!--Deal of the day-->
					<article class="default clearfix">	
						<h2>Hỗ trợ đặt phòng?</h2>
						<p>Gọi cho nhóm dịch vụ khách hàng của chúng tôi theo số dưới đây để nói chuyện với một trong những cố vấn của chúng tôi, những người sẽ giúp bạn với tất cả các nhu cầu kỳ nghỉ của bạn.</p>
						<p class="number">1800 1989</p>
					</article>
					<!--//Deal of the day-->
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection