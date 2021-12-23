<template>
    <div>
        <div></div>

       <div class="card">
        <div class="card-body">
            <h4>All Salary</h4>
              <label>Search</label>
              <input type="text"placeholder="Enter " />
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Sl</th>
                   <th>Month</th>
                   <th>Action</th>
                 </tr>
               </thead>

               <tbody>
                 <tr v-for="AllSalary in AllSalarys" :key="AllSalary.id">

                  <td>{{AllSalary.id}}</td>
                  <td>{{AllSalary.salary_month}}</td>
                  <td>
                   <router-link :to="{name:'salary_monthly_details',params:{month:AllSalary.salary_month}}" class="btn btn-success btn-sm" >Details</router-link>
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

        this.AllSalaryList();
    },


    data() {
        return {
           AllSalarys:[],
        }
    },

    methods: {
        AllSalaryList(){
            axios.get('/api/all_salary/')
            .then(all_salary=>this.AllSalarys=all_salary.data)
            .catch(error=>console.log(error.response.data));
        }
    },
}
</script>
