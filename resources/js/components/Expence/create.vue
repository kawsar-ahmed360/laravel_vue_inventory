<template>
    <div>
       <div></div>

       <div class="card">
        <div class="card-body">
          <h4>Expence Add</h4>

            <div class="container">
              <form @submit.prevent="ExpenceInsert">
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
                  <input type="file" @change="PreviewImage" class="form-control" placeholder="Enter Amount"/>
              </div>

              <div class="col-md-12">
                 <label>PreviewImage</label>
                 <img :src="form.image" style="width:100px"/>
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
                details:'',
                amount:'',
                image:'',

            }
        }
    },

    methods: {

        ExpenceInsert(){

            axios.post('/api/Expence-store/',this.form)
            .then(()=>{
                Notification.success();
                this.$router.push({name:'expence_index'});
            })
            .catch();
        },

        PreviewImage(event){
            let file = event.target.files[0];
            if(file.size>1048770){
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
