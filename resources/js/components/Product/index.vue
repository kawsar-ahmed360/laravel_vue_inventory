<template>
    <div>
       <div class="card">
         <div class="card-body">
         <h3>All Proudct List</h3>
         <lable>Search</lable>
         <input type="text" v-model="SearchTerm"/>

           <table class="table table-striped">
             <thead>
               <tr>
                <th>Sl</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Supliar Name</th>
                <th>Product Code</th>
                <th>Root</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Buying Date</th>
                <th>Image</th>
                <th>Action</th>
               </tr>
             </thead>

             <tbody>
                <tr  v-for="AllProduct in FilterProduct" :key="AllProduct.id">
                <td>{{AllProduct.id}}</td>
                <td>{{AllProduct.product_name}}</td>
                <td>{{AllProduct.category_name}}</td>
                <td>{{AllProduct.name}}</td>
                <td>{{AllProduct.product_code}}</td>
                <td>{{AllProduct.root}}</td>
                <td>{{AllProduct.buying_price}}</td>
                <td>{{AllProduct.selling_price}}</td>
                <td>{{AllProduct.buying_date}}</td>
                <td><img style="width:100px" :src="'backend/Product/'+AllProduct.image" ></td>
                <td style="width:150px">
                 <router-link class="btn btn-info btn-sm" :to="{name:'product_edit',params:{id:AllProduct.id}}" ><i class="fa fa-edit"></i></router-link>
                 <a class="btn btn-danger btn-sm" @click="DeleteProduct(AllProduct.id)"><i class="fa fa-trash"></i></a>
                </td>
               </tr>
             </tbody>
           </table>
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
            this.$router.push({name:'/'});
        }
    },

    data() {
        return {
           AllProducts:[],
           SearchTerm:'',
        }
    },

    computed:{
        FilterProduct(){
            return this.AllProducts.filter(pro=>{
                return pro.product_name.match(this.SearchTerm);
            })
        }
    },

    methods: {

         AllProuductShow(){

             axios.get('/api/Product-index/')
             .then(AllPro=>this.AllProducts=AllPro.data)
             .catch()
         },

         DeleteProduct(DeleteId){

             Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                    axios.get('/api/Product-delete/'+DeleteId)
           .then(()=>{
               Notification.SuccessDelete();
               return this.AllProducts = this.AllProducts.filter(pro=>{
                   return pro.id!=DeleteId;
               })


           })
           .catch()


                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })

         },



    },

    created() {
        this.AllProuductShow();
    },
}
</script>
