<template>
    <div>
         <div></div>

         <div class="card">
          <div class="card-body">
            <div class="container">
               <h4>All Product</h4>
                 <label>Search</label>
                 <input type="text" placeholder="enter search">
                <table class="table table-striped">
                 <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                 </thead>


                    <tbody>
                  <tr v-for="Allproduct in Allproducts" :key="Allproduct.id">
                    <td>{{Allproduct.id}}</td>
                    <td>{{Allproduct.product_name}}</td>
                    <td>{{Allproduct.product_code}}</td>
                    <td><img :src="'backend/Product/'+Allproduct.image" style="width:50px" /></td>
                    <td>{{Allproduct.category_name}}</td>
                    <td>{{Allproduct.buying_price}}</td>
                    <td>{{Allproduct.selling_price}}</td>
                    <td>{{Allproduct.product_quantity}}</td>
                    <td v-if="Allproduct.product_quantity>0"><span class="badge badge-success">Available</span></td>
                    <td v-else=""><span class="badge badge-warning">Stock Out</span></td>
                    <td>
                     <router-link :to="{name:'update_qty',params:{id:Allproduct.id}}" class="btn btn-success btn-sm">Update</router-link>
                    </td>

                  </tr>
                 </tbody>


                </table>
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
            this.$routere.push({name:'/'})
        }

        this.AllProduuct();
    },

     data() {
         return {
            Allproducts:[],
         }
     },

    methods: {
      AllProduuct(){
          axios.get('/api/all_product_show/')
          .then(product=>this.Allproducts = product.data)
          .catch()
      }
    },
}
</script>
