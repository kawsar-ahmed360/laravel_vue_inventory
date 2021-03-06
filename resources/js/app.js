

require('./bootstrap');

import Vue from 'vue';

import VueRouter from 'vue-router';

 Vue.use(VueRouter);
import {routes} from './router';

import User from './Helplers/User';
window.User = User;

window.Reload = new Vue;

//..........Notification........
import Notification from './Helplers/Notification';
window.Notification = Notification;

import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;



 const router = new VueRouter({
  routes,
  mode:"history"
})


const app = new Vue({
    el: '#app',
    router
});
