/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import $ from 'jquery';
 window.$ = window.jQuery = $;
require('./bootstrap');

// var Turbolinks = require("turbolinks")
// Turbolinks.start()
import Vue from 'vue'
import vueChatScroll from 'vue-chat-scroll';
window.Vue = Vue;
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);
window.axios = require('axios');
window.moment = require('moment');

require('bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('message',require('./components/Message.vue').default);
Vue.component('conversation', require('./components/Conversations.vue').default);
Vue.component('show-phone-number', require('./components/ShowPhoneNumber.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


// document.addEventListener("turbolinks:load", function(event) {
//     window.livewire.restart();
// });
