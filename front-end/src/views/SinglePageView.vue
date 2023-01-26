<script>
import { store } from '../store'
import axios from 'axios'

export default {
    name: 'SinglePageView',
    data() {
        return {
            store,
            projects: ''
        }
    },
    methods: {
        callAxios(url) {
            axios
                .get(url)
                .then(response => {
                    if (response.data.success) {
                        console.log(response);
                        this.projects = response.data.results
                    }
                })
                .catch(error => {
                    console.error(error)
                    this.error = error.message
                })
        }
    },
    mounted() {
        this.callAxios(store.base_api_url + '/api/projects/' + this.$route.params.slug);
    }
}
</script>

<template>

    <h1>hello</h1>

    <div class="container" v-if="this.projects">
        <h1>Title: {{ this.projects.title }}</h1>
        <p class="lead">Description: {{ this.projects.description }}</p>
        <div class="div d-flex">
            Technologies:
            <p v-for="technology in this.projects.technologies">#{{ technology.name }}</p>
        </div>
    </div>
</template>


<style lang="scss" scoped>

</style>