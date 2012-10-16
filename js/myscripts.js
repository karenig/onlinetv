// JavaScript Document

$(document).ready(function() {
 	var a = $('.left').height();
	var b = $('.middle').height();
  	var c = $('.left4').height();
   	var d = $('.left2').height();
   	var e = $('.left3').height();
  	//var f = $('.left5').height();
  	//var g = $('.left6').height();
   	var h = $('.c1').height();
   	var i = $('.c2').height();
   	var j = $('.c3').height();
   
   	if(d >= e){$('.left3').height(d);}
	else {$('.left2').height(e);}
		
	if(b >= a){$('.left4').height(c + (b - a));}
	
	
	/*if(a > b){$('.right1').height(a - c - 60);}
	else{$('.left5').height(f + (b - a)); $('.left6').height(g + (b - a));}*/
	
	if(h >= i && h >= j){$('.c2').height(h); $('.c3').height(h);}
	else if(i >= h && i >= j){$('.c1').height(i); $('.c3').height(i);}
	else if(j >= h && j >= i){$('.c1').height(j); $('.c2').height(j); }
	
 });
 
function mycarousel_initCallback(carousel)
{
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
$(function () {
    $('#mycarousel').jcarousel({
        auto: 5,
        wrap: 'circular',
        scroll:1,
        initCallback: mycarousel_initCallback
    });
	
$(".newslider-vertical").sliderkit({
        shownavitems:4,
        verticalnav:true,
        navitemshover:true,
        circular:true
});
	
});
 
var timeout = '';
var par = '';
var child_obj = '';
$(document).ready(function() {
    $("a.cont").hover(function(){
        if (timeout) clearTimeout(timeout);
        child_obj = $(this);
        par = child_obj.children("div.active");
        setTimeout("nextThumbnail()", 1000);
    },
    function() {
        if (timeout) clearTimeout(timeout);
    }
);
    
});

function nextThumbnail() {
    par.removeClass("active");
    par.addClass("inactive");
    if(par.next("div").hasClass("inactive")) {
        par.next("div").removeClass("inactive");
        par.next("div").addClass("active");
        par = par.next("div");
        if (timeout) clearTimeout(timeout);
        timeout= setTimeout("nextThumbnail()", 1000);
    } else {
        par.parent("a").children(":first").removeClass("inactive");
        par.parent("a").children(":first").addClass("active");
        par = par.parent("a").children(":first");
        if (timeout) clearTimeout(timeout);
        timeout = setTimeout("nextThumbnail()", 1000);
    }
}



$(document).ready(function() {
    $('#my-fotorama').fotorama();

    var h = $('.c1').height();
    var i = $('.c2').height();
    var j = $('.c3').height();

    if(h >= i && h >= j){$('.c2').height(h); $('.c3').height(h);}
    else if(i >= h && i >= j){$('.c1').height(i); $('.c3').height(i);}
    else if(j >= h && j >= i){$('.c1').height(j); $('.c2').height(j); }
});

function addPoll() {
    var answer = $('input[name=RadioGroup]:checked', '#pollForm').val();
    var poll_id = $('#poll_id').val();
    answer = parseInt(answer);
    poll_id = parseInt(poll_id);
    
    if(answer>0) {
        var root_url = $('#root_url').html();
        $.ajax({
            url: root_url+'/ajax.php',
            type : 'POST',
            data: ({
                action: 'poll',
                id: answer,
                poll_id: poll_id
            }),
            success: function(resp) {
                $("#polls").html(resp);
            }
        });
    }
    else {
        alert('Please select an answer!');
        return false;
    }
    
    return true;
}
