<template>
    <div>
          <div></div>
         <div class="container"  style="border:1px solid silver;margin-top:10px">
           <div class="row">
            <div class="col-md-8">
                <h4 style="text-decoration:underline">Customer Info</h4>
                <span><strong>Name :</strong> {{Customers.name}}</span> <br>
                <span><strong>Email :</strong> {{Customers.email}}</span> <br>
                <span><strong>Phone :</strong> {{Customers.phone}}</span> <br>
                <span><strong>Address :</strong> {{Customers.address}}</span>
            </div>

               <div class="col-md-4">
                <h4 style="text-decoration:underline">Print Info</h4>
                <span><strong>Date :</strong>{{Orders.order_date}}</span> <br>
                <span><strong>Month :</strong> {{Orders.order_month}}</span> <br>
                <span><strong>Print By</strong></span> <br>
            </div>

           </div>
             <hr>
            <div class="row">
                <div class="col-md-12">
                <h4 style="text-decoration:underline">Order</h4>

                    <table class="table table-striped">
                      <thead>
                       <tr>
                         <th>Sl</th>
                         <th>Quentity</th>
                         <th>Subtotal</th>
                         <th>Total</th>
                         <th>Pay</th>
                         <th>Due</th>
                         <th>Payby</th>
                       </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>{{Orders.id}}</td>
                          <td>{{Orders.qty}}</td>
                          <td>{{Orders.subtotal}}</td>
                          <td>{{Orders.total}}</td>
                          <td>{{Orders.pay}}</td>
                          <td>{{Orders.due}}</td>
                          <td>{{Orders.payby}}</td>
                        </tr>
                      </tbody>
                    </table>

                </div>
            </div>


            <hr>

             <div class="row">
                <div class="col-md-12">
                <h4 style="text-decoration:underline">Order Details</h4>

                    <table class="table table-striped">
                      <thead>
                       <tr>
                         <th>Category Name</th>
                         <th>Product Name</th>
                         <th>Product Image</th>
                         <th>Porduct Code</th>
                         <th>Qty</th>
                         <th>product_price</th>
                         <th>SubTotal</th>
                       </tr>
                      </thead>

                      <tbody>
                        <tr v-for="Detail in Details" :key="Detail.id">
                          <td>{{Detail.category_name}}</td>
                          <td>{{Detail.product_name}}</td>
                          <td><img :src="'/backend/Product/'+Detail.img" style="width:40px"></td>
                          <td>{{Detail.product_code}}</td>
                          <td>{{Detail.qty}}</td>
                          <td>{{Detail.product_price}} Tk</td>
                          <td>{{Detail.sub_total}} Tk</td>

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

        this.ViewOrder();
    },

    data() {
        return {
            Orders:'',
            Customers:'',
            Details:'',
        }
    },

    methods: {
        ViewOrder(){
            let Id = this.$route.params.id;
           axios.get('/api/single_order_view/'+Id)
           .then(order=>[
           this.Orders=order.data['order'],
           this.Customers=order.data['cus'],
           this.Details=order.data['details'],

           ])
           .catch()
        }
    },


}
</script>
