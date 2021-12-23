<template>
    <div>
         <div></div>

         <div class="card">
            <div class="card-body">
              <h4>Salary Form</h4>
                 <form @submit.prevent="PaySalary">
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

                    <span style="color:red" v-if="errors.salary_month">{{errors.salary_month[0]}}</span>
                    <span style="color:red" v-if="errors.already">{{errors.already}}</span>
                    </div>


                     <div class="col-md-6">
                      <label>Salary</label>
                      <input type="text" class="form-control"  v-model="form.salary" readonly placeholder="Enter Email" />
                      <span style="color:red" v-if="exists">{{exists}}</span>
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
            this.$router.push({name:'/'});
        }

    },

    data() {
        return {
             form:{
                 salary:'',
                 name:'',
                 email:'',
                 salary_month:'',


             },
             errors:{},
             exists:'',
        }
    },


    methods: {

       PaySalary(){
           let id = this.$route.params.id;
           axios.post('/api/sallary-update/'+id,this.form)
           .then(res=>{
                // this.exists =res.data['already'];
                let error = res.data['already'];

                if(error){
                    Notification.AlreadyExists();

                }else{
                    Notification.success();
                       this.$router.push({name:'all_salary_details'})
                }
           })
           .catch(error=>this.errors=error.response.data.errors)
       }

    },

    created() {
        let ViewId = this.$route.params.id;
         axios.get('/api/single-employe/'+ViewId)
         .then(employe=>this.form = employe.data)
         .catch()
    },
}
</script>
