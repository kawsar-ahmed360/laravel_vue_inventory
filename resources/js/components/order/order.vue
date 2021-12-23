<template>
    <div>
         <div></div>

         <div class="card">
          <div class="card-body">
            <div class="container">
               <h4>Order List</h4>
                 <label>Search</label>
                 <input type="text" placeholder="enter search">
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
                  <tr v-for="OrderView in OrderViews" :key="OrderView.id">
                    <td>{{OrderView.id}}</td>
                    <td>{{OrderView.name}}</td>
                    <td>{{OrderView.total}} Tk</td>
                    <td>{{OrderView.pay}}</td>
                    <td>{{OrderView.due}}</td>
                    <td>{{OrderView.payby}}</td>
                    <td>
                     <router-link :to="{name:'order_details',params:{id:OrderView.id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></router-link>
                     <a @click="OrderDelete(OrderView.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
        this.$router.push({name:'/'});
      }

      this.OrderView();

    },

    data() {
        return {

          OrderViews:[],

        }
    },

    methods: {
         OrderView(){

            axios.get('/api/order_view/')
            .then(order=>this.OrderViews=order.data)
            .catch()

         },

         OrderDelete(Id){
             var alrm = "are you sure";
             if(confirm(alrm)){
            axios.get('/api/order_delete/'+Id)
           .then(()=>{
               Notification.SuccessDelete();
               return this.OrderViews = this.OrderViews.filter(all=>{
                   return all.id!=Id;
               })
           })
           .catch()
             }

         }
    },
}
</script>
