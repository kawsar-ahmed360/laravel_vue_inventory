<template>
    <div>
         <div></div>

         <div class="card">
            <div class="card-body">
              <h4>Salary Edit</h4>
                 <form @submit.prevent="UpdateSalarySection">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Employe Name</label>
                      <input type="text" class="form-control" v-model="form.name" placeholder="Enter name" />
                    </div>

                    <div class="col-md-6">
                      <label>Email</label>
                      <input type="email" class="form-control"  v-model="form.email" placeholder="Enter Email" />
                    </div>

                     <div class="col-md-6">
                      <label>Month</label>
                       <select v-model="form.salary_month" class="form-control">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                       </select>


                    </div>


                     <div class="col-md-6">
                      <label>Salary</label>
                      <input type="text" class="form-control"  v-model="form.salary" readonly placeholder="Enter Email" />
                      <span style="color:red"></span>
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

        this.SingleViewPayment();


    },

    data() {
        return {
             form:{
                 name:'',
                 email:'',
                 salary:'',
                 salary_month:'',

             }
        }
    },

    methods: {

        SingleViewPayment(){
          let Id = this.$route.params.id;
          axios.get('/api/single_salary_edite/'+Id)
          .then(show=>this.form=show.data)
          .catch()
        },

        UpdateSalarySection(){

            let Id = this.$route.params.id;
            axios.post('/api/single_salary_update/'+Id,this.form)
            .then(()=>{
                Notification.success();
                this.$router.push({name:'all_salary_details'})
            })
            .catch()
        }


    },
}
</script>
