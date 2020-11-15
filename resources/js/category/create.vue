<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title d-flex justify-content-between">
                <p>Create Category</p>
                <router-link :to="{name:'category'}" class="btn btn-primary">Category List</router-link>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="createCategory" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <label>Category Name</label>
                    <input v-model="form.name" type="text" name="name"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>
                <button :disabled="form.busy" type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>

    </div>
</template>
<script>
import Form from 'vform';
export default
{

    data () {
        return {
            // Create a new form instance
            form: new Form({
              name:'',
            })
        }
    },
    methods:
        {
            createCategory() {
                this.form.post('/api/category/').then(({data}) => console.log(data));
                this.form.name = '';
                this.$toast.success({
                    title: 'Success',
                    message: 'Data Successfully Created'
                })

            },
        }
}

</script>

<style scoped>


</style>
