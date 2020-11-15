<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">Category Component
                        <router-link :to="{name:'create'}" class="btn btn-primary">Crate Category</router-link>
                    </div>
                    <div class="card-body">
                       <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           <tbody>
                              <tr v-for="(category,index) in categories" :key="category.name">
                                  <td>{{index+1}}</td>
                                  <td>{{category.name}}</td>
                                  <td>{{category.slug}}</td>
                                  <td width="10%">
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                          <router-link :to="{name:'edit',params:{id:category.id}}" class="btn btn-primary">Edit Data</router-link>
                                          <a @click.prevent="deleteCategory(category)" class="btn btn-danger" href="#">Delete Data</a>
                                      </div>
                                  </td>

                              </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data()
    {
        return{
            categories: []
        }
    },
    methods:
        {
            loadCategory()
            {
                axios.get('/api/category').then(responose =>{
                   this.categories = responose.data;
                })
            },

            deleteCategory(category)
            {
                axios.delete(`/api/category/${category.id}`).then(response=>{
                    console.log(response.data);
                })
                let index = this.categories.indexOf(category);
                this.categories.splice(index,1);
            }
        },
    mounted() {
        this.loadCategory();
    }
}
</script>
