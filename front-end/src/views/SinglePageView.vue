<script>
import { store } from '../store'
export default {
    name: 'SinglePageView',
    data() {
        return {
            store
        }
    },
    mounted() {
        store.callAxios(store.base_api_url + '/api/projects/' + this.$route.params.slug, 'projects');
    }
}
</script>

<template>

    <h1>hello</h1>

    <div class="container" v-if="store.projects">
        <h1>Title: {{ store.projects.title }}</h1>
        <p class="lead">Description: {{ store.projects.description }}</p>
        <div class="div d-flex">
            Technologies:
            <p v-for="technology in store.projects.technologies">#{{ technology.name }}</p>
        </div>
    </div>
</template>


<style lang="scss" scoped>

</style>