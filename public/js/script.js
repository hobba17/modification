$(document).ready(function() {
	var rell=$('#block-header').attr('data-url');
	$('#reloadcaptcha').click(function(){
		$('#block-captcha > img').attr('src',rell+'public/reg/reg-captcha.php?r='+ Math.random());
	});
// Кнопка Вверх
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
//Языки
$('#engl,#russ').click(function(){
	var ang = $(this).attr('ang');
	$.ajax({
		type: 'POST',
		url: rell+'public/includes/lang.php',
		data: 'lang='+ang,
		dataType: 'html',
		cache: false,
		success: function() { location.reload(); }
	});
});
//Кнопка языков
$('.langs').toggle(
    function() {
        $(".langs").attr("id","active-button");
        $("#okno-lang").fadeIn(200);
		},
    function() {
        $(".langs").attr("id","");
        $("#okno-lang").fadeOut(200);
});
//Просмотр новостей через GET с перезагрузкой
$('#news_blog > a').click(function(){
	var id = $(this).attr('cop');
	$.ajax({
		type: 'GET',
		url: rell+'count/?id='+id,
		dataType: 'html',
		cache: false,
		success: function(data) { location.reload(); }
	});
});
/*/Просмотр новостей через GET без перезагрузки
$('#news_blog > a').click(function(){
	var id = $(this).attr('cop');
	$.ajax({
		type: 'GET',
		url: rell+'count/index/'+id,
		dataType: 'html',
		cache: false,
		success: function(data) { $('#num'+id).val(data); }
	});
});
//Просмотр новостей через POST
$('#news_blog > a').click(function(){
	var id = $(this).attr('cop');
	$.ajax({
		type: 'POST',
		url: rell+'app/models/OneModel.php',
		data: 'id='+id,
		dataType: 'html',
		cache: false,
		success: function(data) { $('#num'+id).val(data); }
	});
});*/

});