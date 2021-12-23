<template>
    <div>
         <div></div>

         <div class="card">
            <div class="card-body">
              <h4>Update Quantity</h4>
                 <form @submit.prevent="UpdateQty">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Quantity</label>
                      <input type="text" class="form-control" v-model="form.product_quantity"  placeholder="Enter product_quantity" />
                    </div>


                     <div class="col-md-12" style="margin-top:20px">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                   </div>


                  </div>

                  </form>
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
            this.ViewSingleProduct();
    },



    data() {
        return {
           form:{
               product_quantity:'',
           }
        }
    },

    methods: {
        ViewSingleProduct(){
            let Id = this.$route.params.id;
         axios.get('/api/single_product_qty/'+Id)
         .then(show=>this.form=show.data)
         .catch()
        },

        UpdateQty(){
           let Id = this.$route.params.id;
         axios.post('/api/single_product_qty_update/'+Id,this.form)
         .then(()=>{
             Notification.success();
             this.$router.push({name:'show_all_product'})
         })
         .catch()
        }
    },
}
</script>
