<template>
    <div>
         <div></div>

         <div class="card">
          <div class="card-body">
            <div class="container">
               <h4>All Customer</h4>
                 <label>Search</label>
                 <input type="text" v-model="SearchTrem" placeholder="enter search">
                <table class="table table-striped">
                 <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                 </thead>


                    <tbody>
                  <tr v-for="AllCustomerView in FilterSearch" :key="AllCustomerView.id">
                    <td>{{AllCustomerView.id}}</td>
                    <td>{{AllCustomerView.name}}</td>
                    <td>{{AllCustomerView.email}}</td>
                    <td>{{AllCustomerView.phone}}</td>
                    <td>{{AllCustomerView.address}}</td>
                    <td><img :src="'backend/Customer/'+AllCustomerView.image" style="width:100px"  ></td>
                    <td>
                     <router-link :to="{name:'customer_edit',params:{id:AllCustomerView.id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                     <a @click="deleteId(AllCustomerView.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

        this.AllDataView();
    },

    data() {
        return {
        AllCustomerViews:[],
        SearchTrem:'',
        }
    },

    computed:{
        FilterSearch(){
           return this.AllCustomerViews.filter(all=>{
               return all.name.match(this.SearchTrem);
           })
        }
    },

    methods: {
        AllDataView(){
            axios.get('/api/Customer-index/')
            .then(all_data=>this.AllCustomerViews=all_data.data)
            .catch()
        },

        deleteId(Id){

            var alrm = "are your sure this item confirm delete";

            if(confirm(alrm)){

             axios.get('/api/Customer-delete/'+Id)
             .then(()=>{

                 Notification.success();

                 return this.AllCustomerViews = this.AllCustomerViews.filter(all=>{
                     return all.id!=Id;
                 })
             })
             .catch()

            }

        }
    },
}
</script>
