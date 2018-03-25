@extends('flower.master')
@section('css')
<style type="text/css">
	
</style>
@endsection
@section('content')
<!-- banner -->
	<div class="banner1 jarallax">
	</div>
<!-- //banner -->	

<!-- projects -->
<?php
	echo '<pre>';
	print_r($diff_post->toArray());
	echo '</pre>';
	?>
	
	<div class="gallery-grids">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5" >
							<div class="l_item">
								<img src="{{asset('/public/upload/post').'/'.$result->Avatar}}" alt="" width="100%">
								<span class="ibadge inew"></span>
							</div>
							<div>
								<span class=""><span>Giá:</span>{{$result->lang[0]->pivot->Price}}</span>
								<span class=""><span>Giá(Sale):</span>{{$result->lang[0]->pivot->Sale_Price}}</span>
								<span class=""><span>Màu Sắc:</span>{{$result->color->lang[0]->pivot->Name}}</span>
								
							</div>
						</div>
						<div class="col-md-7" >
							<div class="detail-product">
								<h1>{{$result->lang[0]->pivot->Title}}</h1>
								<p>{{$result->lang[0]->pivot->Short_Descriptions}}</p>
								<ul class="benefit">
									<li>Tặng banner, thiệp (trị giá 20.000đ) miễn phí</li>
									<li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li>
									<li>Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE&nbsp;lần thứ 2, 5% cho đơn hàng Bạn&nbsp;tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn&nbsp;tạo&nbsp;ONLINE&nbsp;lần thứ 12&nbsp;<em>(Chỉ áp dụng tại Tp. HCM)</em></li>
									<li>Giao miễn phí trong nội thành 63/63 tỉnh</li>
									<li>Giao gấp trong vòng 2 giờ</li>
									<li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li>
									<li>Cam kết hoa tươi trên 3 ngày</li>
								</ul>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel with-nav-tabs panel-default panel-default-product">
				                <div class="panel-heading">
				                        <ul class="nav nav-tabs">
				                            <li class="active"><a href="#tab1default" data-toggle="tab">Thông tin thêm</a></li>
				                            <li><a href="#tab2default" data-toggle="tab">Hướng dẫn thanh toán</a></li>
				                            <li><a href="#tab3default" data-toggle="tab">Chính sách và điều khoản</a></li>
				                        </ul>
				                </div>
				                <div class="panel-body">
				                    <div class="tab-content">
				                        <div class="tab-pane fade in active" id="tab1default">
				                        	{!!$result->lang[0]->pivot->Descriptions!!}
				                        </div>
				                        <div class="tab-pane fade" id="tab2default">
				                        	<div id="payment" style="display: block; position: static; visibility: visible;" class="active">
				                        	            <p><span>Bạn có thể chọn một số cách thanh toán sau:</span></p>
				                        	<p><span style="color: #ff0000;"><strong>1. Tiền mặt:</strong></span></p>
				                        	<p>
				                        		<span style="color: #ff0000;">
				                        			<strong>1.1 Thanh toán trực tiếp tại văn phòng công ty</strong>
				                        		</span>
				                        	</p>
				                        	<p><span>Công ty Cổ phần Color Life</span></p>
				                        	<p>
				                        		<strong>
				                        			<span>Địa chỉ 1:</span>
				                        		</strong>
				                        		<span> 270F Võ Thị Sáu, P.7, Q.3, Tp.Hồ Chí Minh (24/7)</span>
				                        	</p>
				                        	<p><strong>ĐT:</strong> 028. 7300 2010 (24/7) &nbsp;- 024.7300 2010&nbsp;&nbsp;(24/7)</p>
				                        	<p><strong><span><span style="color: #ff0000;">1.2 Thanh toán tiền mặt khi nhận hoa</span><br></span></strong><span><br> Chúng tôi hỗ trợ phương thức thanh toán COD (Cash on Delivery) - thanh toán tiền mặt khi giao hoa trong trường hợp bạn là người đặt và người nhận hoa, nhằm hỗ trợ tối đa việc đặt và nhận hàng.<br> <br> </span><strong><span><span style="color: #ff0000;">1.3 Thu tiền mặt ở địa điểm khác</span><br></span></strong><span><br> Trong trường hợp bạn không phải người nhận hoa để thanh toán tiền mặt khi nhận hoa, bạn cũng không thể chuyển khoản hoặc đến văn phòng công ty Hoayeuthuong.com để thanh toán, chúng tôi hỗ trợ giao hoa và thu tiền ở 2 địa điểm khác nhau. Tuy nhiên, phương thức thanh toán này sẽ có thêm phí dịch vụ (tùy khu vực). Vui lòng liên hệ nhân viên để biết thêm chi tiết (email contact@hoayeuthuong.com hoặc hotline&nbsp;028. 7300 2010 (24/7) &nbsp;- 024.7300 2010&nbsp;&nbsp;(24/7)</span><strong><br></strong></p>
				                        	<p style="color: red;"><strong>2. Thanh toán chuyển khoản qua ngân hàng:</strong></p>
				                        	<p>Bạn đến bất kỳ ngân hàng nào ở Việt Nam để chuyển tiền theo thông tin bên dưới (bạn không nhất thiết phải có tài khoản ngân hàng)</p>
				                        	<div style="border: 1px #ddd solid; text-align: center; float: left; margin: 3px;">
				                        	</div>
				                        	        </div>
				                        </div>
				                        <div class="tab-pane fade" id="tab3default">
				                        	<div id="terms" style="display: block; position: static; visibility: visible;" class="active">
											    <p align="center"><span style="font-size: large;"><strong>Các Điều Khoản và quy định</strong></span></p>
											<p align="center"><strong>Áp dụng từ 20/10/2010</strong></p>
											<p><br> <em>Các điều khoản hợp đồng sau đây là thỏa thuận giữa các bên, bao gồm&nbsp;:</em><br> &nbsp;<br> <strong>- Công Ty TNHH COLOR LIFE</strong>&nbsp;- 270F Võ Thị Sáu, P.7, Q.3 là chủ sở hữu website <a href="http://hoayeuthuong.com/"><strong><em>http://hoayeuthuong.com</em></strong></a><strong>,</strong> sau đây gọi tắt là <strong>Hoayeuthuong</strong>.</p>
											<p>- Tất cả thông tin trên website gồm bài viết, hình ảnh, thiết kế quy trình được giữ bản quyền của công ty TNHH Color Life, nghiêm cấm các hành vi sao chép và chia sẻ với mục đích kinh doanh.</p>
											<p>- Cá nhân hoặc tổ chức thực hiện việc đặt mua hàng trực tuyến qua trang web thuộc sở hữu của công ty là:&nbsp;<strong>http://hoayeuthuong.com</strong>, trang web thương mại điện tử, hoặc đặt hàng qua điện thoại sau đây gọi là “<strong> Khách hàng</strong>”.<br> <br> - Khách hàng sau khi mua hàng sẽ được gọi là “<strong>Khách mua hàng</strong>”. Khách mua hàng sẽ được hiểu chấp nhận quyền và nghĩa vụ của khách hàng.<br> <br> Mọi yêu cầu đặt mua hàng trên trang web&nbsp;<a href="http://hoayeuthuong.com/">http://hoayeuthuong.com</a><strong> </strong>hoặc qua các công cụ hỗ trợ (điện thoại, yahoo, skype,…) đều được hiểu là khách hàng đã hiểu và chấp nhận các điều khoản qui định trong “&nbsp;<strong>Các Điều Khoản Mua Hàng</strong>&nbsp;“. Sự hiểu và chấp nhận các điều khoản này không cần thiết phải có chữ ký tay của khách hàng.<br> <br> Khách hàng có thể truy cập nội dung “ <strong>Các Điều Khoản Mua Hàng</strong> ” bất cứ lúc nào trên trang web. Các điều khoản có trong “ <strong>Các Điều Khoản Mua Hàng</strong> “ này sẽ được áp dụng trong trường hợp có bất kỳ nội dung hoặc văn bản nào mâu thuẫn.<br> <br> Thông tin của khách hàng khi đăng ký sẽ được nhân viên của chúng tôi liên hệ lại để đảm bảo mọi thông tin của khách hàng là chính xác. Các thông tin này sẽ được sử dụng như các yếu tố cần thiết để thực hiện việc mua hàng.</p>
											<p>Chúng tôi giữ quyền thay đổi nội dung “ <strong>Các Điều Khoản Mua Hàng</strong> “ bất kỳ lúc nào. Điều khoản được áp dụng sẽ là những điều khoản được qui định tại thời điểm thực hiện việc mua hang. Khách mua hàng nên in và lưu giữ những qui định này.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 1 – MỤC ĐÍCH ÁP DỤNG</strong><br> &nbsp;<br> Các nội dung trong “ <strong>Các Điều Khoản Mua Hàng</strong> “ được áp dụng dành riêng cho việc bán hàng của chúng tôi trên trang web <a href="http://hoayeuthuong.com/">http://hoayeuthuong.com</a> hoặc đặt qua điện thoại. Khách hàng đặt mua hàng đồng nghĩa với việc khách hàng chấp nhận một cách không điều kiện các điều khoản có trong “ <strong>Các Điều Khoản Mua Hàng</strong> “. Các thông tin khách hàng dùng để đăng ký trên trang web của chúng tôi sẽ là những yếu tố được sử dụng trong cam kết của khách hàng với chúng tôi.</p>
											<p><br> Ngược lại, tất cả các yêu cầu của khách hàng không được chấp nhận bởi công ty chúng tôi đều không có giá trị. Công ty chúng tôi có quyền thay đổi nội dung các điều khoản bất kỳ lúc nào. Chúng tôi khuyến cáo khách hàng nên tham khảo thường xuyên trên trang web để cập nhập nội dung các điều khoản mua hàng.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 2 – TRUY CẬP TRANG WEB</strong><br> &nbsp;<br> 2.1. Các mặt hàng có giá khác 0đ (không đồng) đươc đặt trên website đều là các mặt hàng khách hàng có thể mua.<br> <br> 2.2. Để có thể đặt mua hàng, khách hàng cần phải hoàn tất thủ tục cung cấp các thông tin liên lạc cá nhân. Trong đó, khách hàng cần điền một số thông tin bắt buộc để có thể thực hiện việc đặt mua. Khách hàng cần thiết phải nhập thông tin chính xác, cụ thể và đầy đủ. Trong trường hợp khách hàng cung cấp thông tin sai, không chính xác và không đầy đủ, công ty chúng tôi có quyền từ chối và hủy bỏ đơn hàng. Khách hàng chịu hoàn toàn trách nhiệm đối với tất cả hậu quả tài chính có thể xảy ra trong quá trình sử dụng trang web bằng tài khoản đăng ký của mình.<br> <br> 2.3. Chúng tôi khuyến cáo khách hàng một số chú ý sau đây&nbsp;:<br> - Khách hàng chỉ được phép sử dụng và/hoặc tải xuống các thông tin có trên trang web của chúng tôi vì mục đích cá nhân, không vì mục đích thương mại và có giới hạn về thời gian.<br> - Khách hàng không được phép copy hoặc sử dụng nội dung có trên trang web của chúng tôi trên các trang web khác.<br> - Khách hàng không được phép sử dụng, sử dụng lại, thay đổi, di chuyển, trích dẫn, thay thế, phát tán … trực tiếp hoặc gián tiếp, dưới bất kỳ hình thức nào toàn bộ hoặc từng phần (hình ảnh, nội dung …) có trên trang web của chúng tôi cũng như tên, biểu trưng, biểu tượng của trang web và của công ty.<br> - Khách hàng vui lòng thông báo cho chúng tôi về bất kỳ những vi phạm kể trên, để chúng tôi có hướng xử lý nhằm phục vụ khách hàng ngày một tốt hơn.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 3 – ĐẶT MUA HÀNG</strong><br> &nbsp;<br> Hiện nay, chúng tôi chỉ tiếp nhận những đơn đặt hàng giao tại Việt Nam và một số quốc gia trên thế giới.<br> Khách hàng cần phải hoàn tất các yêu cầu khi thanh toán mua hàng để có thể đặt mua hàng. Sau khi khách hàng mua hàng, chúng tôi sẽ gọi điện thoại xác nhận về thời điểm cũng nhưng phương cách mua hàng, tất cả thông tin này đều được thâu âm và chỉ được sử dụng khi có khiếu nại.<br> &nbsp;<br> Các thông tin khách hàng sử dụng khi đăng ký với chúng tôi sẽ được sử dụng sau đó trong quá trình giao hàng. Chúng tôi có quyền tạm ngưng, hủy bỏ hoặc từ chối tất cả các đơn hàng của một khách hàng trong trường hợp có vấn đề liên quan đến thông tin cung cấp và thanh toán của các đơn hàng trước đó.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 4 – TÌNH TRẠNG HÀNG HÓA</strong><br> &nbsp;<br> Các mẫu hàng và giá đều sẵn sàng khi chúng xuất hiện trên trang web của chúng tôi, trong giới hạn số lượng tồn kho sẵn có. Trong trường hợp không có đủ nguyên vật liệu cấu thành sản phẩm của khách hàng, chúng tôi sẽ tiến hành trao đổi với khách hàng phương án thay thế, sau khi được sự đồng ý của khách hàng thì đơn hàng mới có hiệu lực.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 5 – GIÁ</strong><br> &nbsp;<br> Tất cả giá sản phẩm đều bằng tiền VND, đã bao gồm phí chuyển hàng qua đối tác của chúng tôi và chưa bao gồm thuế VAT (10%). Khách hàng thanh toán bằng tiền Mỹ Kim (USD) sẽ áp dụng tỉ giá ngoại tệ của Ngân hàng Vietcombank tại thời điểm thanh toán. Khách hàng cũng có thể chuyển khoản cho chúng tôi bằng các ngoại tệ khác. Chi tiết vui lòng liên hệ địa chỉ mail : <strong><em>contact@hoayeuthuong.com</em></strong><em><br> </em>Chúng tôi nhận chuyển hàng tới Tp. Hồ Chí Minh, Hà Nội và các tỉnh thành trên toàn quốc, ngoài ra chúng tôi cũng có chuyển một số đơn hàng đến các quốc gia khác, các đơn hàng chuyển ngoài Tp. Hồ Chí Minh và Hà Nội vui lòng liên lạc với số điện thoại của chúng tôi ở phần liên hệ.&nbsp;<br> Chúng tôi giữ quyền thay đổi giá hàng hóa bất kỳ lúc nào, nhưng luôn ở mức giá hợp lý nhất với chất lượng tốt nhất để nâng cao tính cạnh tranh và đảm bảo lợi ích của khách hàng.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 6 – THỜI HẠN GIAO HÀNG VÀ VẬN CHUYỂN</strong><br> &nbsp;<br> <strong>6.1 Điều Kiện Chung</strong></p>
											<p>Hàng sẽ được giao tại địa chỉ được nêu bởi khách hàng khi đặt mua. Khách hàng có trách nhiệm cung cấp đầy đủ các thông tin cần thiết để quá trình giao hàng được diễn ra thuận lợi như&nbsp;: Tên người nhận, địa chỉ chính xác, số nhà, tỉnh, tên phố, tên quận, huyện, phường, xã, số điện thoại cần liên hệ… Chúng tôi không chịu trách nhiệm đối với các trường hợp chuyển hàng sai địa chỉ do lỗi của khách hàng.</p>
											<p>Trong trường hợp không có người nhận hoặc người người nhận không đồng ý nhận, vấn đề sẽ xử lý sẽ như sau:</p>
											<p>- Các mặt hàng không thể để lâu được: Hoa, bánh kem: Khách hàng phải trả 100% giá trị.<br> - Các mặt hàng cây cảnh, cây trồng: Khách hàng trả 50% giá trị.<br> - Các mặt hàng khác (Bánh kẹo, gâu bông): Khách hàng không phải trả.<br> &nbsp;<br> <strong>6.2 Thời Gian Giao Hàng</strong>&nbsp;<br> Sau khi nhận được thanh toán trước của khách hàng, chúng tôi sẽ giao đúng thời gian khách hàng yêu cầu, trong trường hợp giờ giao không phù hợp chúng tôi sẽ trao đổi trước. Đơn hàng chỉ được thực hiện khi có sự đồng ý của cả 2 bên.&nbsp;<br> &nbsp;<br> <strong>6.3 Các vấn đề khi giao hàng</strong></p>
											<p>Việc giao hàng sẽ được thực hiện bởi đối tác do chúng tôi lựa chọn. Hàng hóa trong quá trình vận chuyển có thể chịu rủi ro ngoài ý muốn như gãy, hỏng … Khách hàng cần kiểm tra kỹ tình trạng gói hàng cũng như số lượng đơn hàng. Mọi khiếu nại liên quan đến việc vận chuyển hàng hóa cần phải được khách hàng thông báo lại cho chúng tôi trong vòng 1 giờ đồng hồ sau khi nhận được hàng. Khách hàng có thể thông báo&nbsp;<br> - Liên hệ trực tiếp qua điện thoại trong phần liên hệ<br> - Gửi thông tin ý kiến phản hồi về địa chỉ email : <a href="mailto:contact@hoayeuthuong.com">contact@hoayeuthuong.com</a> <br> &nbsp;<br> <strong>6.4 Theo dõi đơn hàng</strong></p>
											<p>Khách hàng có thể theo dõi tình trạng giao hàng tại phần Thao dõi đơn hàng trên website hoặc gọi điện về tổng đài của chúng tôi. Nhân viên của chúng tôi sẽ có trách nhiệm thông báo tới khách hàng về tình trạng đơn hàng. Ngay khi nhận được đơn đặt hàng của khách hàng, nhân viên của chúng tôi sẽ liên lạc với khách hàng để thông báo về tình trạng của đơn hàng đó và các bước cần làm tiếp theo. Nhân viên đó sẽ chịu trách nhiệm giữ liên lạc đến khi khách hàng nhận được hàng của mình.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 7 – THANH TOÁN</strong></p>
											<p><em><span style="text-decoration: underline;">&nbsp;</span></em></p>
											<p>Khách hàng có thể thanh toán chuyển khoản bằng thẻ&nbsp;: VISA, MASTERCARD hoặc qua PAYPAL hoặc các cách khác.<br> Vui lòng xem các thông tin thanh toán của chúng tôi tại phần&nbsp;<a href="http://hoayeuthuong.com/Article.aspx?id=35645">Hướng dẫn thanh toán</a>.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 8 – TRẢ LẠI HÀNG ĐÃ GIAO</strong></p>
											<p><br> Chúng tôi chịu trách nhiệm cung cấp thông tin đầy đủ, chính xác nhất về các mẫu sản phẩm trên trang web <a href="http://www.hoayeuthuong.com/">www.hoayeuthuong.com</a> như hình ảnh, màu sắc, kiểu dáng, kích cỡ, số lượng, chất liệu … Khách hàng cần xem xét kỹ trước khi quyết định đặt mua. Chúng tôi chỉ nhận lại sản phẩm khi sản phẩm đó không đúng với miêu tả trên trang web của chúng tôi và không đúng với yêu cầu trong đơn đặt mua hàng của khách hàng. Trong trường hợp này, khách hàng sẽ được nhận lại 100% số tiền bao gồm&nbsp;: giá sản phẩm + phí giao hàng. Thời hạn hoàn trả tiền chậm nhất là 5 ngày kể từ ngày nhận được trả lời chính thức của chúng tôi. Khách hàng có thể nhận lại tiền qua chuyển khoản, séc, paypal, hoặc tiền mặt…<br> Trong tất cả các trường hợp khác, chúng tôi không chịu trách nhiệm đối với các lỗi không phải do chúng tôi gây ra.<br> Sản phẩm trả lại không đầy đủ, gãy, hỏng, bẩn, rách, mất tag … do lỗi của khách hàng sẽ không được chấp nhận.<br> &nbsp;<br> <strong>ĐIỀU KHOẢN 9 – CHĂM SÓC KHÁCH HÀNG</strong><strong>&nbsp;</strong></p>
											<p><br> Khách hàng có bất kỳ thắc mắc hoặc câu hỏi nào liên quan đến các sản phẩm của chúng tôi, các nhân viên chăm sóc khách hàng của chúng tôi luôn sẵn sàng giải đáp.&nbsp;</p>
											<p>Thời gian phục vụ 24/24. Vui lòng xem thêm thông tin tại phần&nbsp;<a href="http://hoayeuthuong.com/Contact.aspx">Liên hệ</a>.</p>
											<p>&nbsp;</p>
											<p><strong>ĐIỀU KHOẢN 10 - HỦY ĐƠN HÀNG - THAY ĐỔI ĐƠN HÀNG</strong></p>
											<p><br> <strong>1/ Hủy đơn hàng</strong><br> - Đối với Hà Nội và Tp. HCM phải hủy trước 8 giờ hành chính (từ 7h00 sáng đến 21h00).<br> - Đơn hàng ở tỉnh phải hủy trước 12giờ&nbsp;hành chính (từ 7h00 sáng đến 21h00).<br> Các đơn hàng hủy sau thời gian này vẫn phải thanh toán 100% cho công ty.</p>
											<p><br> <strong>2/ Thay đổi đơn hàng</strong><br> Thay đổi sản phẩm trước thời điểm phát hoa dự kiến 04 giờ (hoặc khi sản phẩm chưa được<br> thiết kế):&nbsp;Được chấp nhận và không tính phí.<br> Không chấp nhận thay đổi sản phẩm ngay trước thời điểm phát hoặc khi sản phẩm đã được thiết kế.<br> Trong trường hợp sản phẩm mới có giá trị nhỏ hơn giá trị sản phẩm đã đặt, Công ty không hoàn trả lại tiền chênh lệnh. Trong trường hợp sản phẩm mới có giá trị lớn hơn&nbsp;sản phẩm đã đặt, khách hàng phải thực hiện việc thanh toán giá trị chênh lệch, cộng với phí thay đổi .Việc thực hiện chuyển phát điện hoa sẽ được thực hiện sau khi việc thanh toán hoàn tất.</p>
											
											<p align="right">&nbsp;</p>
											        </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
						</div>
						<div class="col-md-12">
							<h2>NHỮNG MẪU HOA TƯƠI CÙNG LOẠI KHÁC</h2>
							<div class="show-reel tel-prj">
								<div class="row">
									@if(isset($diff_post) && count($diff_post) > 0)
										@foreach($diff_post as $diff)
									<div class="col-md-4 agile-gallery-grid">
										<div class="agile-gallery">
											<a href="images/s1.jpg" class="lsb-preview" data-lsb-group="header">
												<img src="{{asset('/public/upload/post').'/'.$diff->Avatar}}" alt="" />
												<div class="agileits-caption">
													<!-- <h4></h4> -->
													<p>{{$diff->lang[0]->pivot->Short_Descriptions}}</p>
												</div>
											</a>
										</div>
										<div class="agile-gallery-dt">
											<div class="title-flower">
												<a href="detail.php">{{$diff->lang[0]->pivot->Title}}</a>
											</div>
											<div class="price">
											@if(isset($diff->lang[0]->pivot->Price_Sale) && $diff->lang[0]->pivot->Price_Sale != "")
												<span class="oprice">{{$diff->lang[0]->pivot->Price}}</span>
												<span>{{$diff->lang[0]->pivot->Price_Sale}}đ</span>
											@else
												<span>{{$diff->lang[0]->pivot->Price}}đ</span>
											@endif	
											</div>
										</div>
									</div>
										@endforeach
									@endif
									<!-- <div class="col-md-4 agile-gallery-grid">
										<div class="agile-gallery">
											<a href="images/s2.jpg" class="lsb-preview" data-lsb-group="header">
												<img src="/public/flower/images/s2.jpg" alt="" />
												<div class="agileits-caption">
													<h4>Upholstery</h4>
													<p>Sed ultricies non sem sit amet laoreet. Ut semper erat erat.</p>
												</div>
											</a>
										</div>
										<div class="agile-gallery-dt">
											<div class="title-flower">
												<a href="detail.php">Ngày Vàng Tươi</a>
											</div>
											<div class="price">
												<span class="oprice">700.000 đ</span>
												<span>650.000 đ</span>
											</div>
										</div>
									</div>
									<div class="col-md-4 agile-gallery-grid">
										<div class="agile-gallery">
											<a href="images/s3.jpg" class="lsb-preview" data-lsb-group="header">
												<img src="/public/flower/images/s3.jpg" alt="" />
												<div class="agileits-caption">
													<h4>Upholstery</h4>
													<p>Sed ultricies non sem sit amet laoreet. Ut semper erat erat.</p>
												</div>
											</a>
										</div>
										<div class="agile-gallery-dt">
											<div class="title-flower">
												<a href="detail.php">Ngày Vàng Tươi</a>
											</div>
											<div class="price">
												<span class="oprice">700.000 đ</span>
												<span>650.000 đ</span>
											</div>
										</div>
									</div> -->
									<div class="clearfix"> </div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3" >
					<div>
						<img src="/public/flower/images/dat-hoa-so-luong-lon.png" alt="" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //projects -->

<!-- //footer -->
@endsection