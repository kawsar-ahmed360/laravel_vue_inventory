<template>
    <div>
        <div class="card">
           <div class="card-body">
              <h2>Product Edit:</h2>
               <form @submit.prevent="UpdateProduct">
               <div class="row">
                 <div class="col-md-6">
                   <label>Product Name</label>
                    <input type="text" class="form-control" v-model="form.product_name" placeholder="Enter Product Name" />
                 </div>

                 <div class="col-md-6">
                   <label>Product code</label>
                    <input type="text" class="form-control" v-model="form.product_code" placeholder="Enter Product Code" />
                 </div>

                  <div class="col-md-6 mt-2">
                   <label>Category Name</label>
                    <select class="form-control" v-model="form.category_id">
                      <option disabled="">Select Once</option>
                      <option v-for="categoryShow in categoryShows" :key="categoryShow.id" :value="categoryShow.id" >{{categoryShow.category_name}}</option>
                    </select>
                 </div>


                  <div class="col-md-6 mt-2">
                   <label>Supliar Name</label>
                    <select class="form-control" v-model="form.supllier_id">
                      <option disabled="">Select Once</option>
                      <option v-for="supliarShow in supliarShows" :key="supliarShow.id" :value="supliarShow.id">{{supliarShow.name}}</option>
                    </select>
                 </div>

                  <div class="col-md-6 mt-2">
                   <label>Root</label>
                    <input type="text" class="form-control" v-model="form.root" placeholder="root" />
                 </div>


                 <div class="col-md-6 mt-2">
                   <label>Buying Price</label>
                    <input type="text" class="form-control" v-model="form.buying_price" placeholder="buying Price" />
                 </div>

                 <div class="col-md-6 mt-2">
                   <label>Selling Price</label>
                    <input type="text" class="form-control" v-model="form.selling_price" placeholder="Selling Price" />
                 </div>


                   <div class="col-md-6 mt-2">
                   <label>Buying date</label>
                    <input type="date" class="form-control" v-model="form.buying_date" placeholder="" />
                 </div>


                   <div class="col-md-6 mt-2">
                   <label>Product Quantity</label>
                    <input type="text" class="form-control"  v-model="form.product_quantity" placeholder="quantity" />
                 </div>


                    <div class="col-md-6 mt-2">
                   <label>Image</label>
                    <input type="file" @change="UpdatePreviewImage" class="form-control" placeholder="quantity" />
                   </div>


                    <div class="col-md-6 mt-2">
                   <label>Preview Image</label>
                    <img :src="form.newImage" style="width:100px;height:100px" />
                   </div>

                    <div class="col-md-6 mt-2">

                   </div>





                    <div class="col-md-6 mt-2">

                      <button type="submit" class="btn btn-success">Submit</button>
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

        axios.get('/api/category-view/')
        .then(cate=>this.categoryShows = cate.data)
        .catch()


        axios.get('/api/supliar-view/')
        .then(sup=>this.supliarShows = sup.data)
        .catch()

        let editeId = this.$route.params.id;
        axios.get('/api/Product-edit/'+editeId)
        .then(edite => this.form = edite.data)
        .catch()

    },

    data() {
        return {
            form:{
                  category_id:'',
                product_name:'',
                product_code:'',
                root:'',
                buying_price:'',
                selling_price:'',
                supllier_id:'',
                buying_date:'',
                image:'',
                product_quantity:'',
                newImage:'',
            },
            categoryShows:'',
            supliarShows:'',
        }
    },

    methods: {

       UpdatePreviewImage(event){
             let file = event.target.files[0];
        if(file.size > 1048770){
            Notification.ImageValidation();
        }else{
              let reader = new FileReader();
           reader.onload=event=>{
               this.form.newImage = event.target.result;
           }
           reader.readAsDataURL(file);
        }
       },

       UpdateProduct(){
           let EditeId = this.$route.params.id;
           axios.post('/api/Product-update/'+EditeId,this.form)
           .then(()=>{
               Notification.success();
               this.$router.push({name:'product_index'});
           })
           .catch()
       }
    },
}
</script>
