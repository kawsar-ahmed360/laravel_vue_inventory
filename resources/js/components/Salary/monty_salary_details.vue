<template>
    <div>
        <div></div>

       <div class="card">
        <div class="card-body">
            <h4>{{Monthname}} Month Salary Details</h4>
              <label>Search</label>
              <input type="text" v-model="SearchTrem" placeholder="Enter " />
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Sl</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Phone</th>
                   <th>Action</th>
                 </tr>
               </thead>

               <tbody>
                 <tr v-for="MonthlyDetail in FilterSearch" :key="MonthlyDetail.id">

                  <td>{{MonthlyDetail.id}}</td>
                  <td>{{MonthlyDetail.name}}</td>
                  <td>{{MonthlyDetail.email}}</td>
                  <td>{{MonthlyDetail.address}}</td>
                  <td>{{MonthlyDetail.phone}}</td>

                  <td>
                   <router-link :to="{name:'pay_salary_edit',params:{id:MonthlyDetail.id}}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></router-link>
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

        this.MonthLySalaryView();
    },

    data() {
        return {

          MonthlyDetails:[],
          SearchTrem:'',
          Monthname:'',

        }
    },

    computed:{
        FilterSearch(){

           return this.MonthlyDetails.filter(allva=>{
               return allva.phone.match(this.SearchTrem) || allva.name.match(this.SearchTrem);
           })
        }
    },

    methods: {
        MonthLySalaryView(){
         let Month = this.$route.params.month;
         this.Monthname = Month;
          axios.get('/api/monthly_salary_details/'+Month)
          .then(all=>this.MonthlyDetails=all.data)
          .catch()
        }
    },
}
</script>
