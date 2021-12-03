<template>
    <div>

<div class="login-box" style="margin-left:30%">
  <div class="login-logo">

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="login">
        <div class="input-group mb-3">
         <span style="" class="shower" v-if="errors.email">{{errors.email[0]}}</span>
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">

         <router-link to="/forget">I forgot my password</router-link>
      </p>
      <p class="mb-0">
          <router-link to="/register">Register a new membership</router-link>

      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
    </div>
</template>

<script>

export default {
    created(){
        if(User.loggedIn()){
         this.$router.push({name:'home'});
        }
    },
 data(){
     return {
         form:{
              email:null,
              password:null
         },

         errors:{}
     }
 },
 methods: {
     login(){
        axios.post('/api/auth/login',this.form)
        .then(res=> {
            User.responseAfterlogin(res),
            Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
            })
            this.$router.push({name:'home'})
        })
        .catch(error=>this.errors = error.response.data.errors)
        .catch(
            Toast.fire({
                icon: 'error',
                title: 'wrong'
                })
        )
     }
 },
}
</script>

<style lang="">

</style>
