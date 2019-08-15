
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
    if( confirm('You sure you want to delete?') ){
        this.submit();
    }
});

