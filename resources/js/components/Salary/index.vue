<template>
    <div>
        <div></div>

       <div class="card">
        <div class="card-body">
            <h4>All Employes</h4>
              <label>Search</label>
              <input type="text" v-model="SearchTrem" placeholder="Enter " />
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Sl</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Salary</th>
                   <th>Action</th>
                 </tr>
               </thead>

               <tbody>
                 <tr v-for="AllEmploye in FilterSearch" :key="AllEmploye.id">
                  <td>{{AllEmploye.id}}</td>
                  <td>{{AllEmploye.name}}</td>
                  <td>{{AllEmploye.email}}</td>
                  <td>{{AllEmploye.phone}}</td>
                  <td>{{AllEmploye.salary}} Taka</td>
                  <td>
                   <router-link class="btn btn-success btn-sm" :to="{name:'salary_edit',params:{id:AllEmploye.id}}">Pay Salary</router-link>
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
           AllEmployes:[],
           SearchTrem:'',
        }
    },

    computed:{
       FilterSearch(){
        return this.AllEmployes.filter(allem=>{
            return allem.phone.match(this.SearchTrem) || allem.name.match(this.SearchTrem);

        })
       }
    },

    methods: {

    },

    created() {
        axios.get('/api/all-employe-show/')
        .then(allemp=>this.AllEmployes = allemp.data)
        .catch()
    },
}
</script>
