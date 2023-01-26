<script>
import { store } from '../store'
import axios from 'axios'

export default {
    name: 'ProjectList',

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
        this.callAxios(store.base_api_url + '/api/projects')
    }
}
</script>

<template>


    <div class="row align-items-center py-5" v-for="project in this.projects">
        <div class="col-7" data-aos="fade-up" data-aos-duration="1000">
            <img :src="store.getImagePath(project.image)" alt="{{ project.title }}">
        </div>
        <div class="col-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="fw-bold text-capitalize pt-2">{{ project.slug }}</h2>
            <p class="pt-1">
                {{ project.description }}
            </p>
            <div class="project-button">
                <router-link :to="{ name: 'single-page', params: { slug: project.slug } }">SinglePage</router-link>
            </div>
        </div>
    </div>

</template>