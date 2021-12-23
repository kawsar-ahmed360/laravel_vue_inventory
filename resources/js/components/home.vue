<template>
    <div>
       <!-- Small boxes (Stat box) -->
        <div class="row" style="margin-top:20px">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{Total_income}} tk</h3>

                <p>Total Sale Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{Total_pay}} tk</h3>

                <p>Total Pay Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{Total_due}} tk</h3>

                <p>Total Due Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{Total_order}}</h3>

                      <p>Total Order Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-md-12">
            <h3>Today Order List:</h3>

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
                     <tr v-for="today_order in today_orders" :key="today_order.id">
                    <td>{{today_order.id}}</td>
                    <td>{{today_order.name}}</td>
                    <td>{{today_order.total}} Tk</td>
                    <td>{{today_order.pay}}</td>
                    <td>{{today_order.due}}</td>
                    <td>{{today_order.payby}}</td>
                     <td> <router-link :to="{name:'order_details',params:{id:today_order.id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></router-link></td>
                     </tr>
                 </tbody>
               </table>

          </div>
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
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

    this.TodaySale();
   },

   data() {
       return {
           Total_income:'',
           Total_pay:'',
           Total_due:'',
           Total_order:'',
           today_orders:[],
       }
   },

   methods: {
       TodaySale(){
           axios.get('/api/today_total_report/')
           .then(data=>[
               this.Total_income = data.data['total'],
               this.Total_pay = data.data['pay'],
               this.Total_due = data.data['due'],
               this.Total_order = data.data['order_total'],
               this.today_orders = data.data['today_order'],
           ])
           .catch()
       }
   },
};




</script>
