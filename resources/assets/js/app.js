
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.


Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
 */


//import jquery ui datepicker
import 'jquery-ui/ui/widgets/datepicker.js';


//show/hide services list
$('.edit-services').click(function(e){
	e.preventDefault();
	$('.services-form').slideToggle();
});


//date picker
$('.date-field').datepicker();

//confirm delete
$('.delete-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to delete? This can\'t be undone.') ){
	  this.submit();
	}
});

$('.archive-client-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to archive this client? This will also archive any sites and projects associated with this client.') ){
	  this.submit();
	}
});

$('.archive-site-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to archive this site?') ){
	  this.submit();
	}
});

$('.archive-project-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to archive this project?') ){
	  this.submit();
	}
});

$('#editURLModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var url = button.data('url') // Extract info from data-* attributes
	var type = button.data('type') // Extract info from data-* attributes
	var environment = button.data('environment') // Extract info from data-* attributes
	var path = button.data('path') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

  	modal.find('.modal-body form').attr('action', path)
	modal.find('.modal-body input[name="url"]').val(url)
	modal.find('.modal-body select[name="type"]').val(type)
	modal.find('.modal-body select[name="environment"]').val(environment)
})


$('#editDomainModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var site_id = button.data('siteid')
	var exp_date = button.data('exp') // Extract info from data-* attributes
	var path = button.data('path') // Extract info from data-* attributes
	var hosted_at = button.data('hosted-at') // Extract info from data-* attributes
	var remote_id = button.data('remote-id') // Extract info from data-* attributes
	var mma_domain = button.data('mma-domain') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

  	modal.find('.modal-body form').attr('action', path)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="exp_date"]').val(exp_date)
	modal.find('.modal-body select[name="site_id"]').val(site_id)
	modal.find('.modal-body select[name="remote_provider_type"]').val(hosted_at)
	modal.find('.modal-body input[name="remote_provider_id"]').val(remote_id)

	if (mma_domain == 1) {
		modal.find('.modal-body input[name="free_with_mma"]').attr("checked","checked");
	} else {
		modal.find('.modal-body input[name="free_with_mma"]').removeAttr("checked");
	}

})

$('#editUserModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var id = button.data('id') // Extract info from data-* attributes
	var role = button.data('role') // Extract info from data-* attributes
	var email = button.data('email') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

	modal.find('.modal-body form').attr('action', 'user/' + id)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="email"]').val(email)
	modal.find('.modal-body select[name="role"]').val(role)
})

$('#editServiceModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var id = button.data('id') // Extract info from data-* attributes
	var price = button.data('price') // Extract info from data-* attributes
	var description = button.data('description') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

	modal.find('.modal-body form').attr('action', 'services/' + id)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="price"]').val(price)
	modal.find('.modal-body textarea[name="description"]').val(description)
})

$('#editHostModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var id = button.data('id') // Extract info from data-* attributes
	var owner = button.data('owner') // Extract info from data-* attributes
	var details = button.data('details') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

	modal.find('.modal-body form').attr('action', 'hosting/' + id)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body select[name="owner"]').val(owner)
	modal.find('.modal-body textarea[name="details"]').val(details)
})

$('#userDeleteModel').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id = button.data('id') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

	modal.find('.modal-body form').attr('action', 'user/' + id)
})

$('select#site-client-select').change(function() {
	var form = $(this).closest('form')
  	$(form).attr('action', '/clients/' + $(this).val() + '/sites')
})

$('select#project-client-select').change(function() {
	var form = $(this).closest('form');
	var id = $(this).val()
	
  	$(form).attr('action', '/clients/' + $(this).val() + '/projects')

	$.ajax({
	   type:'GET',
	   url:'/clients/' + id + '/client-sites',
	   success:function(data){
      	  	$('#project-site-select').empty()
			$('#project-site-select').append($('<option value="">None</option>'))

		    $.each(data, function(i) {
		    	$('#project-site-select').append($('<option>' + data[i].name + '</option>').val(data[i].id))
		    })
		}
	});
})

$('.sort').click(function(e) {
  	var button = $(this)
  	var order = button.data('order')
  	var model = button.data('model')
  	var attribute = button.data('sort')

	$.ajax({
	   type:'GET',
	   url:'/sort',
	   data: {
	   	order: order,
	   	model: model,
	   	attribute: attribute
	   },
	   success:function(data) {
	   		if (order == "asc") {
	   			button.data('order', 'desc')
	   			button.find('i').removeClass('fa-sort')
	   			button.find('i').removeClass('fa-sort-desc')
	   			button.find('i').addClass('fa-sort-asc')
	   		} else {
	   			button.data('order', 'asc')
	   			button.find('i').removeClass('fa-sort')
	   			button.find('i').removeClass('fa-sort-asc')
	   			button.find('i').addClass('fa-sort-desc')
	   		}

	   		switch(model) {
	   			case "client":
		      	  	$('#client-modal-list').empty()
				    $.each(data, function(i) {
				    	$('#client-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/2"><a href="' + data[i].URL + '" class="text-orange-500 no-underline lg:text-sm">' + data[i].name + '</a></div><div class="lg:w-1/2"><p>' + data[i].AM + '</p></div></div>')
				    })
				    break;
				case "project":
		      	  	$('#project-modal-list').empty()
				    $.each(data, function(i) {
				        var favorite = '<form method="POST" action="/favorite/project/' + data[i].projectId + '"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><button type="submit"><i class="fa fa-star-o text-yellow-300"></i></button></form>';
				        if (Number.isInteger(parseInt(data[i].favorite_id))) {
				          favorite = '<form method="POST" action="/favorite/' + data[i].favorite_id + '"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"><button type="submit"><i class="fa fa-star text-yellow-300"></i></button></form>';
				        }
				    	$('#project-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/6"><a href="' + data[i].URL + '" class="text-orange-500 no-underline lg:text-sm">' + data[i].title + '</a></div><div class="lg:w-1/4"><p>' + data[i].status + '</p></div><div class="lg:w-1/6"><p>' + data[i].developerName + '</p></div><div class="lg:w-1/6"><p>' + data[i].clientAccountManagerName + '</p></div><div class="lg:w-1/6"><p>' + data[i].end_date + '</p></div><div class="lg:w-1/6 text-right">' + favorite + '</div></div>')
				    })
					break;
				case "site":
		      	  	$('#site-modal-list').empty()
				    $.each(data, function(i) {
				    	$('#site-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/3"><a href="' + data[i].URL + '" class="text-orange-500 no-underline lg:text-sm">' + data[i].name + '</a></div><div class="lg:w-1/3"><p>' + data[i].clientName + '</p></div><div class="lg:w-1/3"><p>' + data[i].status + '</p></div></div>')
				    })
					break;
			}
		}
	});
})

$('.search-bar input').keyup(function(e){
	var input = $(this)
	var model = input.data('model')
	var value = input.val()

  	$.ajax({
		type:'GET',
		url:'/filter',
		data: {
			 model: model,
			 value: value
		},
		success:function(data) {
		 	switch(model) {
				case "site":
					$('#site-modal-list').empty()

					if (jQuery.type(data) === "string") {
						$('#site-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/3">' + data + '</div></div>')
					} else {
						$.each(data, function(i) {
							$('#site-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/3"><a href="' + data[i].URL + '">' + data[i].name + '</a></div><div class="lg:w-1/3"><p>' + data[i].client_name + '</p></div><div class="lg:w-1/3"><p>' + data[i].status + '</p></div></div>')
						})
					}
					break;
				case "client":
		      	  	$('#client-modal-list').empty()

					if (jQuery.type(data) === "string") {
						$('#client-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/2">' + data + '</div></div>')
					} else {
						$.each(data, function(i) {
							$('#client-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/2"><a href="' + data[i].URL + '">' + data[i].name + '</a></div><div class="lg:w-1/2"><p>' + data[i].AM + '</p></div></div>')
						})
					}
					break;
				case "project":
					$('#project-modal-list').empty()

					if (jQuery.type(data) === "string") {
						$('#project-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/4">' + data + '</div></div>')
					} else {
						$.each(data, function(i) {
							$('#project-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/4"><a href="' + data[i].URL + '">' + data[i].title + '</a></div><div class="lg:w-1/4"><p>' + data[i].client_name + '</p></div><div class="lg:w-1/4"><p>' + data[i].status + '</p></div><div class="lg:w-1/4"><p>' + data[i].developer_name + '</p></div></div>')
						})
					}
					break;
			}
		}
  	})
})

$('.nav-search-bar input').keyup(function(e) {
	var input = $(this)
	var results = $('.search-results')
	var value = input.val()
	var control = $('.nav-search-bar .control')
	control.addClass('open')

  	$.ajax({
		type:'GET',
		url:'/search',
		data: {
			 value: value
		},
		success:function(data) {
			$('.nav-clients-results').empty();
			$('.nav-sites-results').empty();
			$('.nav-projects-results').empty();

			if (jQuery.type(data.clients) === "string" || jQuery.type(data) === "string") {
				$('.nav-clients-results').append('<p class="text-gray-500 text-sm font-normal">No results found.</p>')
			} else {
				$.each(data.clients, function(i) {
					$('.nav-clients-results').append('<a href="' + data.clients[i].URL + '" class="dropdown-item search-results">' + data.clients[i].name + '</a>')
				})
			}

			if (jQuery.type(data.sites) === "string"  || jQuery.type(data) === "string") {
				$('.nav-sites-results').append('<p class="text-gray-500 text-sm font-normal">No results found.</p>')
			} else {
				$.each(data.sites, function(i) {
					$('.nav-sites-results').append('<a href="' + data.sites[i].URL + '" class="dropdown-item search-results">' + data.sites[i].name + '</a><p class="dropdown-item search-results text-gray-500 text-sm font-normal">' + data.sites[i].client_name + '</p>')
				})
			}

			if (jQuery.type(data.projects) === "string"  || jQuery.type(data) === "string") {
				$('.nav-projects-results').append('<p class="text-gray-500 text-sm font-normal">No results found.</p>')
			} else {
				$.each(data.projects, function(i) {
					$('.nav-projects-results').append('<a href="' + data.projects[i].URL + '" class="dropdown-item search-results">' + data.projects[i].title + '</a><p class="dropdown-item search-results text-gray-500 text-sm font-normal">' + data.projects[i].client_name + '</p>')
				})
			}
		}
  	})
})

$('.inputfile').on('change', function(e) {
	if ($(this).val()) {
		var file_name =  e.target.files[0].name
	}

	if (file_name) {
		$('.inputfilelabel').text('')
		$('.inputfilelabel').html('<i class="fa fa-check"></i> ' + file_name.substring(0,10) + '...' )
	} else {
		$('.inputfilelabel').html('<i class="fa fa-plus"></i> Select File')
	}
})

$('form.mma-store').submit(function(e) {
	e.preventDefault(); 

	var form = $(this)
	var update = form.serialize();
	var path = $(this).attr('action')
	var row = $(this).parent().parent()

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
        url: path,
        type: "POST",
        data: update,
        success: function(data) {
			row.addClass("updated");

			var newForm = $("<div class='flex justify-between items-center'>" +
			"<input class='mma-update' name='description' value='" + data.description + "'>" +
			"<div>" +
 	 		"<span class='mr-1'>" + data.username + "</span>" +
			"<span> " + data.friendly_date + "</span>" +
			"</div>" +
			"</div>");

			$(newForm.children("input")).keyup(function(e) {
				e.preventDefault();
			
				var input = $(this)
				var description = input.serialize();
				var update_path = data.path
			
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({ 
					url: update_path ,
					type: 'PATCH',
					data: description,
					success: function(data) {
					}
				})
			})

			form.replaceWith($(newForm))
        }
	});
})

$('input.mma-update').keyup(function(e) {
	e.preventDefault();

	var input = $(this)
	var description = input.serialize();
	var path = input.data('path')

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({ 
		url: path ,
        type: 'PATCH',
		data: description,
		success: function(data) {
		}
	})
})



