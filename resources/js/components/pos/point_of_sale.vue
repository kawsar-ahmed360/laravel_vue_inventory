<template>
    <div>
         <div></div>

          <div class="row">

          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
               <h5>Expence Insert</h5>
               <table class="table table-striped">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>Qty</th>
                     <th>Unit</th>
                     <th>Total</th>
                     <th>Action</th>
                   </tr>
                 </thead>

                 <tbody>
                   <tr v-for="ViewCart in ViewCarts" :key="ViewCart.id">
                     <td>{{ViewCart.pro_name}}</td>
                     <td style="display: inline-flex;"><a class="" @click="Decrement(ViewCart.id)" style="padding-right: 5px;"><span style="background: #c9841d;padding: 4px;color: white;border-radius: 4px;" class="fa fa-minus"></span></a>{{ViewCart.pro_qty}} <a class="" @click="Increment(ViewCart.id)" style="padding-left: 5px;"><span style="background: #3f8d18;padding: 4px;color: white;border-radius: 4px;" class="fa fa-plus"></span></a></td>
                     <td>{{ViewCart.pro_price}}</td>
                     <td>{{ViewCart.sub_total}}</td>
                     <td><a @click="CartRemove(ViewCart.id)" class="btn btn-danger btn-sm"><span style="color:white;font-size:14px" class="fa fa-window-close"></span></a></td>
                   </tr>
                 </tbody>
               </table>
              </div>
            </div>


              <div class="card">
              <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>Total Qty</th>
                      <td class="text-right">{{qty}}</td>
                    </tr>

                    <tr>
                      <th>Sub-Total</th>
                      <td class="text-right">{{Total}}</td>
                    </tr>


                    <tr>
                      <th>Vat</th>
                      <td class="text-right">0%</td>
                    </tr>

                     <tr>
                      <th>Total</th>
                      <td class="text-right">{{Total}} Tk</td>
                    </tr>
                  </table>
              </div>
              </div>



               <div class="card">
              <div class="card-body">
              <form @submit.prevent="orderdone">
                  <div class="row">
                     <div class="col-md-12">
                        <label>Customer Name</label>
                        <select class="form-control" v-model="customer_id">
                         <option disable selected>----Select Once-----</option>
                         <option :value="AllCustomer.id" v-for="AllCustomer in AllCustomers" :key="AllCustomer.id">{{AllCustomer.name}}</option>
                        </select>
                     </div>

                     <div class="col-md-12">
                        <label>Pay</label>
                         <input type="text" class="form-control" v-model="pay" placeholder="pay"/>
                     </div>

                     <div class="col-md-12">
                        <label>Due</label>
                         <input type="text" class="form-control" v-model="due" placeholder="due"/>
                     </div>

                      <div class="col-md-12">
                        <label>Pay By</label>
                        <select class="form-control" v-model="payby">
                         <option disable selected>----Select Once-----</option>
                         <option value="Bikash">Bikash</option>
                         <option value="Hand-Cash">Hand-Cash</option>
                        </select>
                     </div>
                       <br/>
                      <div class="col-md-12" style="margin-top:10px">
                       <button class="btn btn-success btn-sm" type="submit">Submit</button>
                      </div>
                  </div>
                  </form>
              </div>
              </div>


          </div>

          <div class="col-md-7">
          <div class="card">
              <div class="card-body">
               <h4>All Product List</h4>


               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
                </li>
                <li class="nav-item" v-for="AllCategory in AllCategorys" :key="AllCategory.id">
                  <a class="nav-link" id="profile-tab"  data-toggle="tab" href="#profile" role="tab" @click="CateProduct(AllCategory.id)" aria-controls="profile" aria-selected="false">{{AllCategory.category_name}}</a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    </br>
               <label>Search</label>
                 <input type="text" v-model="SearchTrem" placeholder="enter search">

                 <br>
                   <div class="row">
                     <div class="col-md-3" v-for="AllProduct in FilterSearch" :key="AllProducts.id" style="border:1px solid silver;margin-top:3px">
                        <a  @click.prevent="AddToCart(AllProduct.id)">
                        <img :src="'backend/Product/'+AllProduct.image" style="width: 119px;border-radius: 3px;margin: auto;display: block;" />
                        <h6 style="font-weight: bold;text-align: center;font-size: 14px;margin-top: 13px;border:1px dotted silver">{{AllProduct.product_name}}</h6>
                        <span style="margin:0 auto;display:block;margin-bottom:4px" class="badge badge-success" v-if="AllProduct.product_quantity>0">Available({{AllProduct.product_quantity}})</span>
                        <span style="margin:0 auto;display:block;margin-bottom:4px" class="badge badge-danger" v-else="">Stock Out(0)</span>
                      </a>
                     </div>
                   </div>

                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                   </br>
               <label>Search</label>
                 <input type="text" v-model="CategorySearchTrem" placeholder="enter search">

                 <br>
                   <div class="row">
                     <div class="col-md-3" v-for="CatWiseProduct in CategoryFilerProduct" :key="CatWiseProduct.id" style="border:1px solid silver;margin-top:3px">
                        <a  @click.prevent="AddToCart(CatWiseProduct.id)">
                        <img :src="'backend/Product/'+CatWiseProduct.image" style="width: 119px;border-radius: 3px;margin: auto;display: block;" />
                        <h6 style="font-weight: bold;text-align: center;font-size: 14px;margin-top: 13px;border:1px dotted silver">{{CatWiseProduct.product_name}}</h6>
                        <span style="margin:0 auto;display:block;margin-bottom:4px" class="badge badge-success" v-if="CatWiseProduct.product_quantity>0">Available({{CatWiseProduct.product_quantity}})</span>
                        <span style="margin:0 auto;display:block;margin-bottom:4px" class="badge badge-danger" v-else="">Stock Out(0)</span>
                      </a>
                     </div>
                   </div>


                </div>

              </div>



              </div>
            </div>
          </div>


          </div>


    </div>
</template>

<style lang="">

</style>
<script>
export default {
    created() {
        if(!User.loggedIn()){
           this.$router.push({name:'/'})
        }

        this.ViewCart();
        this.ViewAllProduct();
        this.ViewAllCategory();
        this.AllCustomer();

        Reload.$on('AfterAdd',()=>{
            this.ViewCart();
        })

        Reload.$on('DeleteCart',()=>{
             this.ViewCart();
        })
        Reload.$on('DecrementCart',()=>{
             this.ViewCart();
        })

        Reload.$on('Increment',()=>{
             this.ViewCart();
        })
    },

    data() {
        return {
             AllProducts:[],
             CatWiseProducts:[],
             AllCategorys:'',
             SearchTrem:'',
             CategorySearchTrem:'',
             AllCustomers:'',
             ViewCarts:[],
             customer_id:'',
             pay:'',
             due:'',
             payby:'',

        }
    },

    computed:{
        FilterSearch(){
            return this.AllProducts.filter(pro=>{
                return pro.product_name.match(this.SearchTrem);
            })
        },

        CategoryFilerProduct(){

            return this.CatWiseProducts.filter(allp=>{
                return allp.product_name.match(this.CategorySearchTrem);
            })
        },

        qty(){
            let sum=0;
            for(let i=0; i<this.ViewCarts.length; i++){
              sum+=(parseFloat(this.ViewCarts[i].pro_qty));
            }
            return sum;
        },

        Total(){
            let sum =0;
            for(let i=0; i<this.ViewCarts.length; i++){
               sum+=(parseFloat(this.ViewCarts[i].pro_qty) * parseFloat(this.ViewCarts[i].pro_price));
            }
            return sum;
        }
    },

    methods:{

         ViewAllProduct(){
           axios.get('/api/pos-index/')
           .then(product =>this.AllProducts = product.data)
           .catch()
         },

         ViewAllCategory(){
           axios.get('/api/pos-view_all_category/')
           .then(AllCat=>this.AllCategorys=AllCat.data)
           .catch()
         },

         CateProduct(Id){
            axios.get('/api/pos-cat_wise_product/'+Id)
           .then(CatPro=>this.CatWiseProducts=CatPro.data)
           .catch()
         },


          AllCustomer(){
            axios.get('/api/pos-view_all_customer/')
           .then(AllCust=>this.AllCustomers=AllCust.data)
           .catch()
         },

         ViewCart(){
            axios.get('/api/view-cart/')
           .then(ViewCart=>this.ViewCarts=ViewCart.data)
           .catch()
         },

         AddToCart(Id){
             axios.get('/api/add-to-Cart/'+Id)
             .then(()=>{
                    Reload.$emit('AfterAdd');
                    Notification.success();
             })
             .catch()
         },

         CartRemove(Id){
             axios.get('/api/remove-cart/'+Id)
             .then(()=>{
                 Reload.$emit('DeleteCart');
                 Notification.SuccessDelete();
             })
             .catch()
         },

         Decrement(Id){
               axios.get('/api/decrement-cart/'+Id)
             .then(err=>{
                 if(err.data=='Minimun quentity limite cross'){
                    Notification.LimiteCross();
                 }else{
                  Reload.$emit('DecrementCart');
                 Notification.SuccessDecrement();
                 }

             })
             .catch()
         },

         Increment(Id){
            axios.get('/api/increment-cart/'+Id)
             .then(err=>{

                  Reload.$emit('Increment');
                 Notification.SuccessIncrement();


             })
             .catch()

         },

         orderdone(){
           let total = this.Total;
           var data = {qty:this.qty,total:this.Total,customer_id:this.customer_id,payby:this.payby,pay:this.pay,due:this.due}
           axios.post('/api/orderdone/',data)
           .then(err=>{
               if(err.data=='customer_null'){

                   Notification.customerNotFound();
               }else if(err.data=='paynull'){
                  Notification.paynull();
               }else if(err.data=='payby'){
                  Notification.payby();
               }else if(err.data=='allqty'){
                   Notification.paynull();
               }
               else{
                Notification.success();
               this.$router.push({name:'home'});
               }

           })
           .catch()

         }

    },
}
</script>
