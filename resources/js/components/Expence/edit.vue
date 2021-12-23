<template>
    <div>
          <div class="card">
        <div class="card-body">
          <h4>Expence Edit</h4>

            <div class="container">
              <form @submit.prevent="ExpenceUpdated">
              <div class="row">
              <div class="col-md-12">
                 <label>Details</label>
                  <textarea class="form-control" v-model="form.details" placeholder="Enter Details"></textarea>
              </div>

                <div class="col-md-12">
                 <label>Amount</label>
                  <input type="text" v-model="form.amount" class="form-control" placeholder="Enter Amount"/>
              </div>


              <div class="col-md-12">
                 <label>Image</label>
                  <input type="file" @change="PreviewUpdate" class="form-control" placeholder="Enter Amount"/>
              </div>

              <div class="col-md-12">
                 <label>PreviewImage</label>
                 <img :src="form.newImage" style="width:100px"/>
              </div>


               <div class="col-md-12" style="margin-top:20px">
                  <button type="submit" class="btn btn-success btn-sm">Submit</button>
              </div>
            </div>
            </form>
            </div>

        </div>
       </div>

    </div>
</template>

<script>
export default {
     created() {
        if(!User.loggedIn()){
            this.$router.push({name:'/'});
        }

       let EditeId = this.$route.params.id;
         axios.get('/api/Expence-edit/'+EditeId)
         .then(editedata=> this.form=editedata.data)
         .catch()

    },

    data() {
        return {
           form:{
               details:'',
               amount:'',
               image:'',
               newImage:''
           }
        }
    },

    methods: {

        ExpenceUpdated(){
         let Id = this.$route.params.id;
         axios.post('/api/Expence-update/'+Id,this.form)
         .then(()=>{
             Notification.success();
             this.$router.push({name:'expence_index'});
         })
         .catch();

        },

        PreviewUpdate(event){
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
        }
    },


}
</script>
