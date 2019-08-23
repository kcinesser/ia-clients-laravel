
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

 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//show/hide services list
$('.edit-services').click(function(e){
  e.preventDefault();
  $('.services-form').slideToggle();
});

//confirm delete
$('.delete-form').submit(function(e){
  e.preventDefault();
  if( confirm('You sure you want to delete?') ){
      this.submit();
  }
});

$('#editDomainModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var registrar = button.data('registrar') // Extract info from data-* attributes
	var exp_date = button.data('exp') // Extract info from data-* attributes
	var path = button.data('path') // Extract info from data-* attributes

	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)

  	modal.find('.modal-body form').attr('action', path)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="exp_date"]').val(exp_date)
	modal.find('.modal-body select[name="registrar_id"]').val(registrar)
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

$('#editRegistrarModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var name = button.data('name') // Extract info from data-* attributes
	var id = button.data('id') // Extract info from data-* attributes
	var url = button.data('url') // Extract info from data-* attributes
	var description = button.data('description') // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)

	modal.find('.modal-body form').attr('action', 'registrars/' + id)
	modal.find('.modal-body input[name="name"]').val(name)
	modal.find('.modal-body input[name="url"]').val(url)
	modal.find('.modal-body textarea[name="description"]').val(description)
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

$('select#site-client-select').change(function() {
	var form = $(this).closest('form')
  	$(form).attr('action', '/clients/' + id + '/sites')
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

