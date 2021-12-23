<template>
    <div>
      <div></div>

       <div class="card">
           <div class="card-body">
                <div class="row">
                   <div class="col-md-6">
                 <form @submit.prevent="DateSearch">
                    <h4>Date/Month/Year Search</h4>
                    <input type="date" v-model="form.date_search" class="form-control" placeholder="Enter date" />
                    <button style="margin-top:6px" type="submit" class="btn btn-success btn-sm">Search</button>
                      </form>
                   </div>



                   <div class="col-md-6">
                    <form @submit.prevent="MonthSearch">
                    <h4>Monthly Search</h4>
                      <select class="form-control" v-model="form.month_search">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                      </select>
                     <button style="margin-top:6px" type="submit" class="btn btn-success btn-sm">Search</button>
                       </form>
                   </div>
                </div>


                  <hr>

                <div class="row">
                 <div class="col-md-12">
                    <h5>Search Result:</h5>
                    <table class="table table-striped">
                 <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Total Amount</th>
                    <th>Pay</th>
                    <th>Due</th>
                    <th>Payment</th>
                    <th>Action</th>
                  </tr>
                 </thead>


                    <tbody>
                  <tr v-for="DateSearchShow in DateSearchShows" :key="DateSearchShow.id">
                    <td>{{DateSearchShow.id}}</td>
                    <td>{{DateSearchShow.name}}</td>
                    <td>{{DateSearchShow.total}} Tk</td>
                    <td>{{DateSearchShow.pay}}</td>
                    <td>{{DateSearchShow.due}}</td>
                    <td>{{DateSearchShow.payby}}</td>
                    <td>
                     <router-link :to="{name:'order_details',params:{id:DateSearchShow.id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></router-link>
                    </td>

                  </tr>
                 </tbody>


                </table>
                 </div>
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
        form:{
          date_search:'',
          month_search:'',
        },

        DateSearchShows:'',

    }
  },

  methods: {
      DateSearch(){
        axios.post('/api/date_search/',this.form)
        .then(show=>this.DateSearchShows=show.data)
        .catch()
      },

      MonthSearch(){
         axios.post('/api/month_search/',this.form)
        .then(show=>this.DateSearchShows=show.data)
        .catch()
      }
  },
}
</script>
