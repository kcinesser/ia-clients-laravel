
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
	if( confirm('Are you sure you want to archive this client? This will also archive any sites and jobs associated with this client.') ){
	  this.submit();
	}
});

$('.archive-site-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to archive this site?') ){
	  this.submit();
	}
});

$('.archive-job-form').submit(function(e){
	e.preventDefault();
	if( confirm('Are you sure you want to archive this job?') ){
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

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

  	modal.find('.modal-body form').attr('action', path)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="exp_date"]').val(exp_date)
	modal.find('.modal-body select[name="site_id"]').val(site_id)
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

$('select#job-client-select').change(function() {
	var form = $(this).closest('form');
	var id = $(this).val()
	
  	$(form).attr('action', '/clients/' + $(this).val() + '/jobs')

	$.ajax({
	   type:'GET',
	   url:'/clients/' + id + '/client-sites',
	   success:function(data){
      	  	$('#job-site-select').empty()
			$('#job-site-select').append($('<option value="">None</option>'))

		    $.each(data, function(i) {
		    	$('#job-site-select').append($('<option>' + data[i].name + '</option>').val(data[i].id))
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
				case "job":
		      	  	$('#job-modal-list').empty()
				    $.each(data, function(i) {
				    	$('#job-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/4"><a href="' + data[i].URL + '" class="text-orange-500 no-underline lg:text-sm">' + data[i].title + '</a></div><div class="lg:w-1/4"><p>' + data[i].clientName + '</p></div><div class="lg:w-1/4"><p>' + data[i].status + '</p></div><div class="lg:w-1/4"><p>' + data[i].developerName + '</p></div></div>')
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
				case "job":
					$('#job-modal-list').empty()

					if (jQuery.type(data) === "string") {
						$('#job-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/4">' + data + '</div></div>')
					} else {
						$.each(data, function(i) {
							$('#job-modal-list').append('<div class="lg:flex justify-between p-3"><div class="lg:w-1/4"><a href="' + data[i].URL + '">' + data[i].title + '</a></div><div class="lg:w-1/4"><p>' + data[i].client_name + '</p></div><div class="lg:w-1/4"><p>' + data[i].status + '</p></div><div class="lg:w-1/4"><p>' + data[i].developer_name + '</p></div></div>')
						})
					}
					break;
			}
		}
  	})
})




