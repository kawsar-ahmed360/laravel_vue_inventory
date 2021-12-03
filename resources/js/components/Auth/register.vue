<template>
    <div>
         <div class="register-box" style="margin-left:30%">
  <div class="register-logo">

  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form @submit.prevent="signup">
        <div class="input-group mb-3">
          <input type="text" class="form-control" v-model="form.name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" v-model="form.email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" v-model="form.password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
      <router-link to="/">I already have a membership</router-link>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

    </div>
</template>


<style lang="">

</style>


<script>
export default {

    created() {
        if(User.loggedIn()){
            this.$routes.push({name:'home'});
        }
    },

    data(){

        return{
              form:{
                  name:null,
                  email:null,
                  password:null,
              },

              errors:{}
        }

    },

    methods: {
          signup(){
              axios.post('/api/auth/signup',this.form)
              .then(res=>{



                   User.responseAfterlogin(res),
                     Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                        })
                        this.$router.push({name:'home'})
                        })
                        .catch(error=>console.log(error.response.data.errors))

          }
    },
}
</script>
