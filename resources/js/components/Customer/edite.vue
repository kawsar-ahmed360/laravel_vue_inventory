<template>
    <div>
         <div></div>

         <div class="card">
            <div class="card-body">
              <h4>Edit Customer</h4>
                 <form @submit.prevent="UpdateCUSTOMER">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Name</label>
                      <input type="text" class="form-control" v-model="form.name"  placeholder="Enter name" />
                    </div>

                     <div class="col-md-6">
                      <label>Email</label>
                      <input type="email" class="form-control" v-model="form.email"  placeholder="Enter email" />
                    </div>

                     <div class="col-md-6">
                      <label>Phone</label>
                      <input type="text" class="form-control" v-model="form.phone"  placeholder="Enter phone" />
                    </div>

                     <div class="col-md-6">
                      <label>Address</label>
                      <input type="text" class="form-control" v-model="form.address"  placeholder="Enter address" />
                    </div>


                    <div class="col-md-12">
                      <label>Image</label>
                      <input type="file" @change="ImagePreview" class="form-control"  placeholder="Enter address" />
                    </div>

                    <div class="col-md-12">
                      <label>Preview</label>
                      <img :src="form.newImage" style="width:100px" />
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

        this.CustomerEdit();

    },

    data() {
        return {
            form:{
                name:'',
                email:'',
                phone:'',
                address:'',
                newImage:'',
                image:'',

            }
        }
    },

    methods: {

           ImagePreview(event){

            let file = event.target.files[0];
            if(file.size>1048770){
                Notification.ImageValidation();
            }else{
                let reader = new FileReader();
                reader.onload=event=>{
                    this.form.newImage = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        },
        CustomerEdit(){
            let Id = this.$route.params.id;
            axios.get('/api/Customer-edit/'+Id)
            .then(show=>this.form=show.data)
            .catch()
        },



        UpdateCUSTOMER(){
            let Id = this.$route.params.id;
            axios.post('/api/Customer-update/'+Id,this.form)
            .then(()=>{
                Notification.success();
                this.$router.push({name:'customer_index'})
            })
            .catch()
        }




    },
}
</script>
