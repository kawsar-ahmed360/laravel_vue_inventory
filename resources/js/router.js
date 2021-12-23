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


//----------------------Expence Manage----------------
let ExpenceCreate = require('./components/Expence/create.vue').default;
let ExpenceAll = require('./components/Expence/index.vue').default;
let ExpenceEdit = require('./components/Expence/edit.vue').default;

//----------------------Salary Manage----------------
let SalaryAll = require('./components/Salary/index.vue').default;
let salaryEdit = require('./components/Salary/edit.vue').default;
let AllSalary = require('./components/Salary/all_salary.vue').default;
let SalaryMonthlyDetails = require('./components/Salary/monty_salary_details.vue').default;
let editeSalary = require('./components/Salary/salary_edit.vue').default;

//--------------------Stock Manage----------------
let AllProduct = require('./components/Stock/view_alll.vue').default;
let UpdateQty = require('./components/Stock/edit.vue').default;

//----------------------Customer Manage----------------
let AddCustomer = require('./components/Customer/create.vue').default;
let AllCustomer = require('./components/Customer/index.vue').default;
let EditCustomer = require('./components/Customer/edite.vue').default;

//----------------------Order Manage----------------
let Order = require('./components/order/order.vue').default;
let OrderDetails = require('./components/order/order_details.vue').default;
let OrderSearch = require('./components/order/search.vue').default;

//----------------------Point Of Sale----------------
let pos = require('./components/pos/point_of_sale.vue').default;

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


      //-----------------------Expence Manage---------------

      {path:'/expence_create',component:ExpenceCreate,name:'expence_create'},
      {path:'/expence_index',component:ExpenceAll,name:'expence_index'},
      {path:'/expence_edit/:id',component:ExpenceEdit,name:'expence_edit'},

       //-----------------------Salary Manage---------------

       {path:'/salary_index',component:SalaryAll,name:'salary_index'},
       {path:'/salary_edit/:id',component:salaryEdit,name:'salary_edit'},
       {path:'/all_salary_details',component:AllSalary,name:'all_salary_details'},
       {path:'/salary_monthly_details/:month',component:SalaryMonthlyDetails,name:'salary_monthly_details'},
       {path:'/pay_salary_edit/:id',component:editeSalary,name:'pay_salary_edit'},

       //-----------------------Stock Manage---------------
       {path:'/show_all_product',component:AllProduct,name:'show_all_product'},
       {path:'/update_qty/:id',component:UpdateQty,name:'update_qty'},

         //-----------------------Customer Manage---------------

      {path:'/customer_create',component:AddCustomer,name:'customer_create'},
      {path:'/customer_index',component:AllCustomer,name:'customer_index'},
      {path:'/customer_edit/:id',component:EditCustomer,name:'customer_edit'},

       //-----------------------Pos Manage---------------
       {path:'/point_sale',component:pos,name:'point_sale'},

       //---------------------Order Manage----------------
       {path:'/order',component:Order,name:'order'},
       {path:'/order_details/:id',component:OrderDetails,name:'order_details'},
       {path:'/order_search',component:OrderSearch,name:'order_search'},
  ]
