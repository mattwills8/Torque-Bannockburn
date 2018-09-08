$(document).ready(function() {
    
    $('g#floor1').click(function(){
	    if($('tr.floor-1')[0]){
		    $('tr').removeClass('d-none');
		    $('tr.floor-2').toggleClass('d-none');
		    $('tr.floor-3').toggleClass('d-none');
		    $('tbody tr.none').addClass('d-none');
	    }else{
		    $('tbody tr').addClass('d-none');
		    $('tbody tr.none').removeClass('d-none');
	    }
	    
    });
    $('g#floor2').click(function(){
	    if($('tr.floor-2')[0]){
		    $('tr').removeClass('d-none');
		    $('tr.floor-1').toggleClass('d-none');
		    $('tr.floor-3').toggleClass('d-none');
		    $('tbody tr.none').addClass('d-none');
	    }else{
		    $('tbody tr').addClass('d-none');
		    $('tbody tr.none').removeClass('d-none');
	    }
    });
    $('g#floor3').click(function(){
	    if($('tr.floor-3')[0]){
		    $('tr').removeClass('d-none');
		    $('tr.floor-1').toggleClass('d-none');
		    $('tr.floor-2').toggleClass('d-none');
		    $('tbody tr.none').addClass('d-none');
	    }else{
		    $('tbody tr').addClass('d-none');
		    $('tbody tr.none').removeClass('d-none');
	    }
    });
});