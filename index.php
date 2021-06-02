<?php
include ("__parts/header.php");
?>
<?php
include ("__parts/navbar.php");
?>
<?php
include ("__parts/form_result_search.php");
?>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
   function newpage(t,i,a,ra,tri){
   	$.ajax({
   		url:tri,
   		data:'q='+i+'&w='+t+'&e='+a+'&r='+ra,
   		timeout:false,
   		type:'POST',
   		dataType:'JSON',
   		success:function(hasil){
   			$("button").removeAttr("disabled", "disabled");
   			$("#btn-login").html('Cari Lagu Anda!');
   			$("#salsakp").html(hasil.content);
   			$("#pagination").css('display', 'block');
   			$("#type").css('display', 'block');
   			(hasil.btn1.show) ? $("#btn1").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn1.w+'\',\''+hasil.btn1.q+'\',\''+hasil.btn1.e+'\',\''+hasil.btn1.r+'\',\''+tri+'\')') : $("#btn1").css('visibility', 'hidden');
   			(hasil.btn2.show) ? $("#btn2").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn2.w+'\',\''+hasil.btn2.q+'\',\''+hasil.btn2.e+'\',\''+hasil.btn2.r+'\',\''+tri+'\')') : $("#btn2").css('visibility', 'hidden');
   			(hasil.btn3.show) ? $("#btn3").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn3.w+'\',\''+hasil.btn3.q+'\',\''+hasil.btn3.e+'\',\''+hasil.btn3.r+'\',\''+tri+'\')') : $("#btn3").css('visibility', 'hidden');
   			(hasil.btn4.show) ? $("#btn4").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn4.w+'\',\''+hasil.btn4.q+'\',\''+hasil.btn4.e+'\',\''+hasil.btn4.r+'\',\''+tri+'\')') : $("#btn4").css('visibility', 'hidden');
   			(hasil.btn5.show) ? $("#btn5").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn5.w+'\',\''+hasil.btn5.q+'\',\''+hasil.btn5.e+'\',\''+hasil.btn5.r+'\',\''+tri+'\')') : $("#btn5").css('visibility', 'hidden');
   			(hasil.btn6.show) ? $("#btn6").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn6.w+'\',\''+hasil.btn6.q+'\',\''+hasil.btn6.e+'\',\''+hasil.btn6.r+'\',\''+tri+'\')') : $("#btn6").css('visibility', 'hidden');
   			(hasil.btn7.show) ? $("#btn7").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn7.w+'\',\''+hasil.btn7.q+'\',\''+hasil.btn7.e+'\',\''+hasil.btn7.r+'\',\''+tri+'\')') : $("#btn7").css('visibility', 'hidden');
   			(hasil.btn8.show) ? $("#btn8").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn8.w+'\',\''+hasil.btn8.q+'\',\''+hasil.btn8.e+'\',\''+hasil.btn8.r+'\',\''+tri+'\')') : $("#btn8").css('visibility', 'hidden');
   			(hasil.btn9.show) ? $("#btn9").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn9.w+'\',\''+hasil.btn9.q+'\',\''+hasil.btn9.e+'\',\''+hasil.btn9.r+'\',\''+tri+'\')') : $("#btn9").css('visibility', 'hidden');
   			(hasil.btn10.show) ? $("#btn10").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn10.w+'\',\''+hasil.btn10.q+'\',\''+hasil.btn10.e+'\',\''+hasil.btn10.r+'\',\''+tri+'\')') : $("#btn10").css('visibility', 'hidden');
   			(t=='1') ? $("#btn1").addClass("active") : $("#btn1").removeClass("active");
   			(t=='2') ? $("#btn2").addClass("active") : $("#btn2").removeClass("active");
   			(t=='3') ? $("#btn3").addClass("active") : $("#btn3").removeClass("active");
   			(t=='4') ? $("#btn4").addClass("active") : $("#btn4").removeClass("active");
   			(t=='5') ? $("#btn5").addClass("active") : $("#btn5").removeClass("active");
   			(t=='6') ? $("#btn6").addClass("active") : $("#btn6").removeClass("active");
   			(t=='7') ? $("#btn7").addClass("active") : $("#btn7").removeClass("active");
   			(t=='8') ? $("#btn8").addClass("active") : $("#btn8").removeClass("active");
   			(t=='9') ? $("#btn9").addClass("active") : $("#btn9").removeClass("active");
   			(t=='10') ? $("#btn10").addClass("active") : $("#btn10").removeClass("active");
   		},error: function (a, b, c) {
   			$("button").removeAttr("disabled", "disabled");
   			$("#btn-login").html('Cari Lagu Anda!');
   			$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
   			$("#pagination").css('display', 'none');
   			$("#type").css('display', 'none');
   		},beforeSend:function() {
   			$("#btn-login").html('Loading..');
   			$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
   			$("button").attr("disabled", "disabled");
   			$("#pagination").css('display', 'none');
   			$("#type").css('display', 'none');
   		}
   	});
   	return false		
   }
   $(document).keypress(function (e) {
   	if (e.which == 13)
   		$("form#searchform").submit();
   });
   $(document).ready(function(){
   	$('#q').focus();
   		$('#q').keypress(function(){
   			var pdata = $('form#searchform').serialize();
   			$.ajax({
   				url:'search.php',
   				data:pdata,
   				timeout:false,
   				type:'POST',
   				dataType:'JSON',
   				success:function(hasil){
   					$("button").removeAttr("disabled", "disabled");
   					$("#btn-login").html('Cari Lagu Anda!');
   					$("#salsakp").html(hasil.content);
   					$("#pagination").css('display', 'none');
   					$("#type").css('display', 'none');
   					},error: function (a, b, c) {
   						$("button").removeAttr("disabled", "disabled");
   						$("#btn-login").html('Cari Lagu Anda!');
   						$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
   						$("#pagination").css('display', 'none');
   						$("#type").css('display', 'none');
   					},beforeSend:function() {
   						$("#btn-login").html('Loading..');
   						$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
   						$("button").attr("disabled", "disabled");
   						$("#pagination").css('display', 'none');
   						$("#type").css('display', 'none');
   					}
   			});
   		});
   	$("form#searchform").submit(function () {
   		if($('#q').val().length>3){
   			var pdata = 'q='+$('#q').val()+'&w=1&e=0&r=29';
   			var purl = $(this).attr('action');
   			$.ajax({
   				url:purl,
   				data:pdata,
   				timeout:false,
   				type:'POST',
   				dataType:'JSON',
   				success:function(hasil){
   					$("button").removeAttr("disabled", "disabled");
   					$("#btn-login").html('Cari Lagu Anda!');
   					$("#salsakp").html(hasil.content);
   					$("#type").css('display', 'block');
   					$("#pagination").css('display', 'block');
   					$("#single").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'websearch.php\')');
   					$("#artis").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'artistsearch.php\')');
   					$("#album").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'albumsearch.php\')');
   					(hasil.btn1.show) ? $("#btn1").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn1.w+'\',\''+hasil.btn1.q+'\',\''+hasil.btn1.e+'\',\''+hasil.btn1.r+'\',\'websearch.php\')') : $("#btn1").css('visibility', 'hidden');
   					(hasil.btn2.show) ? $("#btn2").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn2.w+'\',\''+hasil.btn2.q+'\',\''+hasil.btn2.e+'\',\''+hasil.btn2.r+'\',\'websearch.php\')') : $("#btn2").css('visibility', 'hidden');
   					(hasil.btn3.show) ? $("#btn3").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn3.w+'\',\''+hasil.btn3.q+'\',\''+hasil.btn3.e+'\',\''+hasil.btn3.r+'\',\'websearch.php\')') : $("#btn3").css('visibility', 'hidden');
   					(hasil.btn4.show) ? $("#btn4").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn4.w+'\',\''+hasil.btn4.q+'\',\''+hasil.btn4.e+'\',\''+hasil.btn4.r+'\',\'websearch.php\')') : $("#btn4").css('visibility', 'hidden');
   					(hasil.btn5.show) ? $("#btn5").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn5.w+'\',\''+hasil.btn5.q+'\',\''+hasil.btn5.e+'\',\''+hasil.btn5.r+'\',\'websearch.php\')') : $("#btn5").css('visibility', 'hidden');
   					(hasil.btn6.show) ? $("#btn6").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn6.w+'\',\''+hasil.btn6.q+'\',\''+hasil.btn6.e+'\',\''+hasil.btn6.r+'\',\'websearch.php\')') : $("#btn6").css('visibility', 'hidden');
   					(hasil.btn7.show) ? $("#btn7").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn7.w+'\',\''+hasil.btn7.q+'\',\''+hasil.btn7.e+'\',\''+hasil.btn7.r+'\',\'websearch.php\')') : $("#btn7").css('visibility', 'hidden');
   					(hasil.btn8.show) ? $("#btn8").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn8.w+'\',\''+hasil.btn8.q+'\',\''+hasil.btn8.e+'\',\''+hasil.btn8.r+'\',\'websearch.php\')') : $("#btn8").css('visibility', 'hidden');
   					(hasil.btn9.show) ? $("#btn9").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn9.w+'\',\''+hasil.btn9.q+'\',\''+hasil.btn9.e+'\',\''+hasil.btn9.r+'\',\'websearch.php\')') : $("#btn9").css('visibility', 'hidden');
   					(hasil.btn10.show) ? $("#btn10").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn10.w+'\',\''+hasil.btn10.q+'\',\''+hasil.btn10.e+'\',\''+hasil.btn10.r+'\',\'websearch.php\')') : $("#btn10").css('visibility', 'hidden');
   					$("#btn1").removeClass("active").addClass("active");
   					$("#btn2").removeClass("active");
   					$("#btn3").removeClass("active");
   					$("#btn4").removeClass("active");
   					$("#btn5").removeClass("active");
   					$("#btn6").removeClass("active");
   					$("#btn7").removeClass("active");
   					$("#btn8").removeClass("active");
   					$("#btn9").removeClass("active");
   					$("#btn10").removeClass("active");
   					},error: function (a, b, c) {
   						$("button").removeAttr("disabled", "disabled");
   						$("#btn-login").html('Cari Lagu Anda!');
   						$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
   						$("#pagination").css('display', 'none');
   						$("#type").css('display', 'none');
   					},beforeSend:function() {
   						$("#btn-login").html('Loading..');
   						$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
   						$("button").attr("disabled", "disabled");
   						$("#pagination").css('display', 'none');
   						$("#type").css('display', 'none');
   					}
   			});
   			}
   			return false
   		});
   	});
</script>
</body>
</html>