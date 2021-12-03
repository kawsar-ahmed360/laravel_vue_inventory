<template>
    <div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Employes <router-link to="/create_employe" class="btn btn-success btn-sm">Add Employe</router-link></h3>
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
                  <th>Salary</th>
                  <th>Address</th>
                  <th>Join date</th>
                  <th>NID</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>


                <tbody>


                <tr v-for="employe in FilterSearch" :key="employe.id">
                  <td>{{employe.id}}</td>
                  <td>{{employe.name}}</td>
                  <td>{{employe.email}}</td>
                  <td>{{employe.phone}}</td>
                  <td>{{employe.salary}}</td>
                  <td>{{employe.address}}</td>
                  <td>{{employe.join_date}}</td>
                  <td>{{employe.nid}}</td>
                  <td><img style="width:100px" :src="employe.image" /></td>
                  <td style="min-width: 92px;">
                    <router-link :to="{name:'edite-employe', params:{id:employe.id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                    <a @click="DeleteEmploye(employe.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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


   data(){
       return{
           employes:[],
           searchTrem:''
       }
   },

computed:{
     FilterSearch(){

        return this.employes.filter(emp=>{
            return emp.phone.match(this.searchTrem)
         });
     }
   },

   methods: {
       AllEmploye(){
           axios.get('api/employe-index')
           .then(emplo=>this.employes=emplo.data)
           .catch()
       },

       DeleteEmploye(id){
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

                   axios.get('/api/employe-delete/'+id)
                   .then(()=>{
                         Notification.SuccessDelete();
                         return this.employes = this.employes.filter(emp=>{
                            return emp.id!=id;
                         })

                   })
                   .catch(()=>{
                       Notification.error();
                   })

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
           this.AllEmploye()
       },

}
</script>
