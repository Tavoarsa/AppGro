'use strict';

$(document).ready(function() {
	cargarPadre();
	
	
});

function cargarPadre()
{


		$.ajax({
		      url: '/padre',
		      type : 'GET'
		    })
		    .done(function(data) {
		      console.log(data); 
		      
		     	      	

		    }).fail(function() {
				alert('error');
			});
	
	
}