<template>
    <div>
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Category <router-link to="/category-create" class="btn btn-success btn-sm">Add Category</router-link></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <label>Search</label>
              <input type="text" v-model="searchTrem">
              <table id="" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>


                <tbody>


                <tr v-for="allCategory in FilterSearch" :key="allCategory.id">
                  <td>{{allCategory.id}}</td>
                  <td>{{allCategory.category_name}}</td>
                  <td><img style="width:100px" :src="'backend/category/'+allCategory.image"></td>
                  <td style="min-width: 92px;">
                    <router-link :to="{name:'category-edit',params:{id:allCategory.id}}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                    <a @click="CategoryDelete(allCategory.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
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
    },

    data() {
        return {
            allCategorys:[],
            searchTrem:'',
        }
    },

    computed:{
         FilterSearch(){
             return this.allCategorys.filter(cate=>{
                 return cate.category_name.match(this.searchTrem);
             })
         }
    },

    methods: {

        AllCategory(){
            axios.get('/api/category-index/')
            .then(allCat=>this.allCategorys = allCat.data)
            .catch()
        },

        CategoryDelete(id){

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {

               axios.get('/api/category-delete/'+id)
               .then(()=>{
                   Notification.success();
                   return this.allCategorys = this.allCategorys.filter(cate=>{
                       return cate.id !=id;
                   })
               })
               .catch()

              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })

        }
    },

    created() {
        this.AllCategory();
    },


}
</script>
