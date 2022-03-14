$(document).ready(function() {
	var rell=$('#block-header').attr('data-url');
	$('#reloadcaptcha').click(function(){
		$('#block-captcha > img').attr('src',rell+'/public/reg/reg-captcha.php?r='+ Math.random());
	});
	function loademail() {
		var recall_email = $("#remind-email").val(), p = /^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)[a-z]{2,6}$/i;
	if (!p.test(recall_email) || (recall_email == "" || recall_email.length > 20)) { $("#remind-email").css("borderColor","#FDB6B6"); }
	else {	recall_email = recall_email.toLowerCase();
			$("#remind-email").css("borderColor","#DBDBDB");
			$("#button-remind").hide();
			$(".authoriz-load").show();
			$.ajax({
				type: "POST",
				url: rell+"/public/includes/remind-pass.php",
				data: "email="+recall_email,
				dataType: "html",
				cache: false,
				success: function(data) {
			if (data == 'yes') {
			$('.authoriz-load').hide();
			$('#button-remind').show();
			$('#message-remind').attr("class","message-remind-success").show().slideDown(400);
			setTimeout("$('#message-remind').html('').hide(),$('#block-remind').hide(),$('#authoriz-input').show()", 3000);
			} else {
			$('.authoriz-load').hide();
			$('#button-remind').show();
			$('#message-remind').attr("class","message-remind-error").html(data).slideDown(400);
			}
			}
	});
	}
	}
	//Функция авторизации
	function loadprofile() {
		var auth_login = $('#auth_login').val(), auth_pass = $('#auth_pass').val();
		if (auth_login == '' || auth_login.length > 25) {
			$('#auth_login').css('borderColor', '#FDB6B6');
			send_login = 'no';
		} else {
			$('#auth_login').css('borderColor', '#DBDBDB');
			send_login = 'yes';
		}
		if (auth_pass == '' || auth_pass.length > 15) {
			$('#auth_pass').css('borderColor', '#FDB6B6');
			send_pass = 'no';
		} else {
			$('#auth_pass').css('borderColor', '#DBDBDB');
			send_pass = 'yes';
		}
		if (send_login == 'yes' && send_pass == 'yes') {
			$('#authoriz-vhod').hide();
			$('.authoriz-load').show();
			$.ajax({
				type: 'POST',
				url: rell+'/public/includes/authoriz.php',
				data: 'login='+auth_login+'&pass='+auth_pass,
				dataType: 'html',
				cache: false,
				success: function(data) {
					if (data == 'yes_auth') {
						location.reload();
					} else if (data == 'ban') {
						$('#ban').slideDown(400);
						$('.authoriz-load').hide();
						$('#authoriz-vhod').show();
					} else {
						$('#no-login').slideDown(400);
						$('.authoriz-load').hide();
						$('#authoriz-vhod').show();
					}
				}
			});
		}
	}
	$('.okno-vipad').toggle(
	 function() {
		$('.okno-vipad').attr('id', 'active-button');
		$('#okno-authoriz').fadeIn(200);
	 },
	 function() {
		 $('.okno-vipad').attr('id', '');
		 $('#okno-authoriz').fadeOut(200);
	 }
	);
	$('#forget-pass').click(function() {
		$('#authoriz-input').fadeOut(200, function() {
			$('#block-remind').fadeIn(300);
		});
	});
	$('#prev-auth').click(function() {
	$('#block-remind').fadeOut(200, function() {
		$('#authoriz-input').fadeIn(300);
		});
	});
$('#button-remind').click(function(){
	loademail();
	});
	$("#remind-email").keypress(function(e){
	if (e.keyCode==13) loademail();
	});
	$('#authoriz-vhod').click(function() {
		loadprofile();
	});
	$(".input-pass,.input-login").keypress(function(e){
	if (e.keyCode==13) loadprofile();
	});
	$('.nick').toggle(
	function() {
		$('.nick').attr('id', 'active-button');
		$('#okno-vihod').fadeIn(200);
	},
	function() {
		$('.nick').attr('id', '');
		$('#okno-vihod').fadeOut(200);
	}
	);
	$(document).mouseup(function (e){
		var div = $("#okno-authoriz,#okno-vihod");
		if (!div.is(e.target)
		    && div.has(e.target).length === 0) {
			div.fadeOut(300);
		}
	});
	//Разлогиниться
	$('#logout').click(function() {
		$.ajax({
			type: 'POST',
			url: rell+'/public/includes/logout.php',
			dataType: 'html',
			cache: false,
			success: function(data) {
				if (data == 'logout') location.reload();
			}
		});
	});
	$('#vihod').click(function () {
		$.ajax({
			type: 'POST',
			url: rell+'/public/includes/logout_admin.php',
			dataType: 'html',
			cache: false,
			success: function (data) {
				if (data == 'logout') location.reload();
			}
		});
	});
	$('#button-pass-show-hide').click(function(){
		var statuspass = $('#button-pass-show-hide').attr('class');
		if (statuspass == 'pass-hide') {
			$('#button-pass-show-hide').attr('class', 'pass-show');
			var $input = $('#auth_pass2');
			var change = 'text';
			var rep = $("<input placeholder='Пароль' type='" + change + "' />")
				.attr('id', $input.attr('id'))
				.attr('name', $input.attr('name'))
				.attr('class', $input.attr('class'))
				.val($input.val())
				.insertBefore($input);
			$input.remove();
			$input = rep;
		} else {
			$('#button-pass-show-hide').attr('class', 'pass-hide');
			var $input = $('#auth_pass2');
			var change = 'password';
			var rep = $("<input placeholder='Пароль' type='" + change + "' />")
				.attr('id', $input.attr('id'))
				.attr('name', $input.attr('name'))
				.attr('class', $input.attr('class'))
				.val($input.val())
				.insertBefore($input);
			$input.remove();
			$input = rep;
		}
	});
	//Фотоаппаратик на форуме
	$('.stylelabel').toggle(
		function() {
			$('.stylelabel').attr('id', 'active-button');
			$('#hiden_form_foto').fadeIn(400);
		},
		function() {
			$('.stylelabel').attr('id', '');
			$('#hiden_form_foto').fadeOut(400);
		}
	);
	var count_input = 1;
	$('#add-input').click(function () {
		if (count_input < 4) {
		    count_input++;
		    $("<div id='addimages"+count_input+"' class='addimage'><input type='hidden' name='MAX_FILE_SIZE' value='2000000'><input type='file' 		name='galleryimg[]'><a class='delete-input' rel='"+count_input+"'>Удалить</a></div>").fadeIn(300).appendTo('#objects');
		}
	});
	$('.delete-input').live('click',function(){
    var rel = $(this).attr('rel');
     $('#addimages'+rel).fadeOut(300,function () {
     $('#addimages'+rel).remove();
     });
	});
	//Удаление профиля
	$('.delprof').click(function (){
		$.confirm({
			'title': 'Подтверждение удаления',
			'message': 'После удаления восстановление будет невозможно! Продолжить?',
			'buttons': {
				'Да': {
					'class': 'blue',
					'action': function(){
						$.ajax({
							type: 'POST',
							url: rell+'/public/includes/del_profile.php',
							dataType: 'html',
							cache: false,
							success: function (data) {
								if (data == 'yes'){
									location.href = rell;
								}
							}
						});
					}
				},
				'Нет': {
					'class': 'gray',
					'action': function(){}
				}
			}
		});
	});
	$(function() {
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else { $('#toTop').fadeOut(); }
		});
		$('#toTop').click(function() {
			$('body,html').animate({scrollTop:0},800);
		});
	});
	$('.delete_comment').click(function () {
		var id = $(this).attr('id');
		$.ajax({
			type: 'POST',
			url: rell+'/public/includes/del_comment.php',
			data: "id="+id,
			dataType: 'html',
			cache: false,
			success: function (data) {
				if (data == 'yes') location.reload();
			}
		});
	});
	//Языки
	$('#engl,#russ').click(function(){
		var ang = $(this).attr('ang');
		$.ajax({
			type: 'POST',
			url: rell+'/public/includes/lang.php',
			data: 'lang='+ang,
			dataType: 'html',
			cache: false,
			success: function() { location.reload(); }
		});
	});
	$('.langs').toggle(
		function() {
			$(".langs").attr("id","active-button");
			$("#okno-lang").fadeIn(200);
		},
		function() {
			$(".langs").attr("id","");
			$("#okno-lang").fadeOut(200);
	});
	/*/Добавление нового коммента
	$('#submit-for').click(function(){
		$.ajax({
			type: 'GET',
			url: rell+'comment/index/',
			dataType: 'html',
			cache: false,
			success: function(data) { location.reload(); }
		});
	});*/
});