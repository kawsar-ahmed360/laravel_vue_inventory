<template>
    <div>
         <div class="register-box" style="margin-left:19%">
            <div class="register-logo">

            </div>

               <!-- general form elements -->
            <div class="card card-primary" style="width:594px">
              <div class="card-header">
                <h3 class="card-title">Create Suplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="InsertSuplier" role="form">
                <div class="card-body">
                 <div class="row">
                  <div class="col-md-6">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" v-model="form.name" id="exampleInputEmail1" placeholder="Enter name">
                  </div>

                  </div>

                  <div class="col-md-6">

                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" v-model="form.email" id="exampleInputPassword1" placeholder="Enter Email">
                  </div>

                  </div>

                  </div>



                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" v-model="form.phone" id="exampleInputPassword1" placeholder="Enter Mobile">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" v-model="form.address" id="exampleInputPassword1" placeholder="Enter Address">
                  </div>


                  <div class="row">
                  <div class="col-md-12">

                  <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" class="form-control" v-model="form.shop_name"  id="exampleInputPassword1" placeholder="Enter Shop Name">
                  </div>


                  </div>



                  </div>




                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" @change="ImagePreview" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>



                 <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img :src="form.image" style="height:100px;width:100px">
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
            <!-- /.register-box -->
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
                  name:'',
                  email:'',
                  phone:'',
                  address:'',
                  shop_name:'',
                  image:''
              }
         }
     },


    methods: {

        InsertSuplier(){
           axios.post('api/supliar-store/',this.form)
           .then(()=>{
               this.$router.push({name:'AllSuplier'})
               Notification.success();
           })
           .catch()
        },

        ImagePreview(event){
            let size = event.target.files[0].size;
            let file = event.target.files[0];
            if(size>1048770){
                Notification.ImageValidation();
            }else{

                let reader = new FileReader();
                reader.onload = event=>{
                    this.form.image = event.target.result;
                }
                reader.readAsDataURL(file);

            }

        }
    },

}
</script>
