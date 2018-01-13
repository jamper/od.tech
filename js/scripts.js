$(function(){
	var Range = $('input#range');
	Range.change(function(){
		$('.avatar img').css('box-shadow', '0px 0px '+Range.val()+'px #fff');
	})
});