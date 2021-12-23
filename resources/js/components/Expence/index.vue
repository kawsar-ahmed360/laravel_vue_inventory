<template>
    <div>
        <div class="card">
        <div class="card-body">
          <h4>All Expence</h4>

            <div class="container">
            <label>Search</label>
            <input type="text" v-model="SearchTrem" placeholder="Enter Any" />
                 <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>Sl</th>
                        <th>Details</th>
                         <th>Amount</th>
                         <th>Image</th>
                         <th>Action</th>
                      </tr>
                  </thead>


                    <tbody>
                      <tr v-for="AllExpence in FilterSearch" :key="AllExpence.id">
                        <td>{{AllExpence.id}}</td>
                        <td>{{AllExpence.details}}</td>
                        <td>{{AllExpence.amount}}</td>
                        <td><img :src="'backend/Expence/'+AllExpence.image" style="width:100px" /></td>
                        <td>
                         <router-link :to="{name:'expence_edit',params:{id:AllExpence.id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                          <a class="btn btn-danger btn-sm" @click="ExpenceDelete(AllExpence.id)" ><i class="fa fa-trash"></i></a>
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
            this.$router.push({name:'/'})
        }


    },

    data() {
        return {
            AllExpences:[],
            SearchTrem:'',
        }
    },

    computed:{

        FilterSearch(){

            return this.AllExpences.filter(all=>{
                return all.details.match(this.SearchTrem);
            })
        }
    },

    methods: {
        AllExpence(){

            axios.get('/api/Expence-index/')
            .then(AllExp=>this.AllExpences = AllExp.data)
            .catch()
        },

        ExpenceDelete(DeleteId){

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


                    axios.get('/api/Expence-delete/'+DeleteId)
                    .then(()=>{
                        Notification.success();

                        return this.AllExpences = this.AllExpences.filter(allex=>{
                            return allex.id!=DeleteId;
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
         this.AllExpence();
    },


}
</script>
