<template>
<nav class="navbar navbar-expand-lg navbar-light">
    <router-link class="navbar-brand" :to="{name:'home'}">Navbar</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{name:'home'}">Home <span class="sr-only">(current)</span></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{name:'category'}">Category</router-link>
            </li>
        </ul>
    </div>
</nav>
</template>

<script>
export default {

}
</script>

<style scoped>

</style>
