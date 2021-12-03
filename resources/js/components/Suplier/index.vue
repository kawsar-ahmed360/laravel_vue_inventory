<template>
    <div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Supliar <router-link to="/create-suplier" class="btn btn-success btn-sm">Add Supplier</router-link></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <label>Search</label>
                <input type="text" v-model="searchTrem">
              <table id="" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Shop Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="supliar in FilterSearch" :key="supliar.id">
                  <td>{{supliar.id}}</td>
                  <td>{{supliar.name}}</td>
                  <td>{{supliar.email}}</td>
                  <td>{{supliar.phone}}</td>
                  <td>{{supliar.address}}</td>
                  <td>{{supliar.shop_name}}</td>
                  <td><img style="width:100px" :src="'backend/suplier/'+supliar.image" /></td>
                  <td style="min-width: 92px;">
                    <router-link :to="{name:'edit-suplier',params:{id:supliar.id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                    <a @click="SupliarDelete(supliar.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
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
 },




  data() {
         return {
             supliars:[],
             searchTrem:''
         }
     },

computed:{
     FilterSearch(){

        return this.supliars.filter(emp=>{
            return emp.phone.match(this.searchTrem)
         })
     }
   },

     methods: {
         AllSupliear(){
             axios.get('api/supliar-index')
             .then(supliar =>this.supliars = supliar.data)
             .catch()
         },

         SupliarDelete(id){

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

                   axios.get('api/supliar-delete/'+id)
                   .then(()=>{
                       Notification.SuccessDelete();
                       return this.supliars = this.supliars.filter(sup=>{
                           return sup.id!=id;
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
         }
     },

     created() {
         this.AllSupliear();
     },

}
</script>
