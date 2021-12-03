let login = require('./components/Auth/login.vue').default;
let resgis = require('./components/Auth/register.vue').default;
let forget = require('./components/Auth/forget.vue').default;
let logout = require('./components/Auth/logout.vue').default;
let home = require('./components/home.vue').default;

//------------------------Employe Vue-----------
let create_employe = require('./components/Employe/create.vue').default;
let all_employe = require('./components/Employe/index.vue').default;
let edite_employe = require('./components/Employe/edite.vue').default;

//------------------------Suplier Vue-----------

let createSuplier = require('./components/Suplier/create.vue').default;
let AllSuplier = require('./components/Suplier/index.vue').default;
let EditSuplier = require('./components/Suplier/edit.vue').default;

//----------------------Category Manage....................

let CategoryCrate = require('./components/Category/create.vue').default;
let CategoryAll = require('./components/Category/index.vue').default;
let CategoryEdite = require('./components/Category/edit.vue').default;

//--------------Product Manage---------------

let ProductCreate = require('./components/Product/create.vue').default;
let ProductAll = require('./components/Product/index.vue').default;
let ProductEdite = require('./components/Product/edit.vue').default;


export const routes = [
        { path: '/', component: login,name:'/' },
        { path: '/register', component: resgis },
        { path: '/forget', component: forget },
       {path: '/home',component:home,name:'home'},
       {path: '/logout',component:logout,name:'logout'},

        //----------------Enploye Route----------
      {path: '/create_employe',component:create_employe,name:'create_employe'},
      {path: '/all_employe',component:all_employe,name:'all_employe'},
      {path: '/edite-employe/:id',component:edite_employe,name:'edite-employe'},

      //----------------Suplier Route----------
      {path:'/create-suplier',component:createSuplier,name:'createSuplier'},
      {path:'/all-suplier',component:AllSuplier,name:'AllSuplier'},
      {path:'/edit-suplier/:id',component:EditSuplier,name:'edit-suplier'},

      //-----------------Category Manage-------------
      {path:'/category-create',component:CategoryCrate,name:'category-create'},
      {path:'/category-index',component:CategoryAll,name:'category_index'},
      {path:'/category-edit/:id',component:CategoryEdite,name:'category-edit'},

      //---------------Product Manage----------------
      {path:'/product_create',component:ProductCreate,name:'product_create'},
      {path:'/product_index',component:ProductAll,name:'product_index'},
      {path:'/product_edit/:id',component:ProductEdite,name:'product_edit'},
  ]
