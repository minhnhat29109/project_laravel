<script src="/frontend/js/jquery.min.js"></script>
	<script src="/frontend/js/bootstrap.min.js"></script>
	<script src="/frontend/js/slick.min.js"></script>
	<script src="/frontend/js/nouislider.min.js"></script>
	<script src="/frontend/js/jquery.zoom.min.js"></script>
	<script src="/frontend/js/main.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">></script>
<script>
    function increment() {
        document.getElementById('demoInput').stepUp();
    }
    function decrement() {
        document.getElementById('demoInput').stepDown();
    }
</script>
<script>
	$(document).ready(function(){
  
	 $('#product_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
	  var query = $(this).val(); //lấy gía trị ng dùng gõ
	  if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
	  {
	   var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
	   $.ajax({
		url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
		method:"GET", // phương thức gửi dữ liệu.
		data:{query:query, _token:_token},
		success:function(data){ //dữ liệu nhận về
		 $('#productList').fadeIn();  
		 $('#productList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
	   }
	 });
	 }
   });
  
	 $(document).on('click', 'li', function(){  
	  $('#product_name').val($(this).text());  
	  $('#productList').fadeOut();  
	});  
  
   });
  </script>
  <script>
	@if(Session::has('success'))
			toastr.success("{{ session('success') }}");
	@endif
  
	@if(Session::has('error'))
			toastr.error("{{ session('error') }}");
	@endif
  </script>
  <script>
	  $(function() {
	
	$(document).on({
		mouseover: function(event) {
			$(this).find('.far').addClass('star-over');
			$(this).prevAll().find('.far').addClass('star-over');
		},
		mouseleave: function(event) {
			$(this).find('.far').removeClass('star-over');
			$(this).prevAll().find('.far').removeClass('star-over');
		}
	}, '.rate');


	$(document).on('click', '.rate', function() {
		if ( !$(this).find('.star').hasClass('rate-active') ) {
			$(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
			$(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
			$(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
		} else {
			console.log('has');
		}
	});
	
});
  </script>