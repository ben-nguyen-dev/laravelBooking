@extends('partner.master')
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
                        <li><a href="#" title="Home">Home</a></li>
                        <li>Chi tiết hóa đơn</li>                                  
                    </ul>
                    <!--//crumbs-->
                
                </nav>
                <!--//breadcrumbs-->

                <!--three-fourth content-->
                <section class="three-fourth" style="width: 100%">
                
					<h1 style="text-align: center;font-size: 40px;">Thông tin hóa đơn</h1>
                    
                    <!--MySettings-->
                    <section id="MySettings" class="tab-content">
                        <article class="mysettings">
                            <h1>Hóa đơn số 01</h1>
                            <table>
                                <tr>
                                    <th>Tên Homestay:</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Loại phòng:</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mô tả :</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>   
                                <tr>
                                    <th>Số lượng</th>
                                    <td>
                                        <input type="number" name="" id="">
                                    </td>
                                </tr>                     
								<tr>
									<th>Check-in Date</th>
									<td>
                                        <div class="f-item datepicker">
                                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" style="
                                                text-align: center; "/></div>
                                        </div>                                        
                                    </td>
								</tr>
								<tr>
									<th>Check-out Date</th>
									<td>
                                        <div class="f-item datepicker">
                                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" style="
                                                text-align: center;" /></div>
                                        </div>
                                    </td>
								</tr>
								<tr>
                                    <th>Giá phòng:</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền:</th>
                                    <td>
                                        <input type="text" name="" id="">
                                    </td>
                                </tr>
                            </table>

                        </article>
                    </section>
                    <!--//MySettings-->
                    
                </section>
            </div>
            <!--//main content-->
        </div>
    </div>
    <!--//main-->
@endsection