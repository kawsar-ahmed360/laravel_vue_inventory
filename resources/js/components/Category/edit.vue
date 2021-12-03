<template>
    <div>
          <div class="register-box" style="margin-left:19%">
            <div class="register-logo">

            </div>

               <!-- general form elements -->
            <div class="card card-primary" style="width:594px">
              <div class="card-header">
                <h3 class="card-title">Category Edite</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="updateCategory"  role="form">
                <div class="card-body">
                 <div class="row">
                  <div class="col-md-12">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" v-model="form.category_name" id="exampleInputEmail1" placeholder="Enter name">
                  </div>

                  </div>

                  </div>







                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" @change="onFileSelectedUpdated"  class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>



                 <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img :src="form.newImage"  style="height:100px;width:100px">
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
                 category_name:'',
                 image:'',
                 newImage:'',
             }
        }
    },

    created() {
       let EditeId = this.$route.params.id;
       axios.get('/api/category-edit/'+EditeId)
       .then(editeCate=>this.form=editeCate.data)
       .catch()
    },

    methods: {

     onFileSelectedUpdated(event){
        let file = event.target.files[0];
        if(file.size > 1048770){
            Notification.ImageValidation();
        }else{
              let reader = new FileReader();
           reader.onload=event=>{
               this.form.newImage = event.target.result;
           }
           reader.readAsDataURL(file);
        }

    },

    updateCategory(){

        let EditeId = this.$route.params.id;
        axios.post('/api/category-update/'+EditeId,this.form)
        .then(()=>{
             Notification.success();
            this.$router.push({name:'category_index'});
        })
        .catch()
    }



    },
}
</script>
