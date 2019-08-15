
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

//show/hide services list
$('.edit-services').click(function(e){
    e.preventDefault();
    $('.services-form').slideToggle();
});

$('#editDomainModal').on('show.bs.modal', function (event) {
  	var button = $(event.relatedTarget) // Button that triggered the modal
  	var name = button.data('name') // Extract info from data-* attributes
	var registrar = button.data('registrar') // Extract info from data-* attributes
	var exp_date = button.data('exp') // Extract info from data-* attributes

  	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 	 // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  	var modal = $(this)

  	console.log(name + " " + registrar + " " + exp_date);

  	modal.find('.modal-body input[name="name"]').val(name)
  	modal.find('.modal-body input[name="exp_date"]').val(exp_date)
  	modal.find('.modal-body select[name="registrar_id"]').val(registrar)
})

//confirm delete
$('.delete-form').submit(function(e){
    e.preventDefault();
    if( confirm('You sure you want to delete?') ){
        this.submit();
    }
});
