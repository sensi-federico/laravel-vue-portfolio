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
    <section class="single-page">

        <div class="jumbotron">
        </div>
        <div class="container pt-5" v-if="this.projects">

            <div class="center d-flex justify-content-center">
                <img class="img-pos" :src="store.getImagePath(this.projects.image)" alt="">
            </div>
            <h1 class="text-center">{{ this.projects.title }}</h1>
            <p class="lead text-center mt-5">{{ this.projects.description }}</p>
            <div class="text-center">
                <h4 class="skill-title fw-bold pb-2 mt-4">Skill used</h4>
                <div class="skills justify-content-center">
                    <h6 class="me-3" v-for="technology in this.projects.technologies">{{ technology.name }} <i
                            class=""></i></h6>
                </div>
            </div>
        </div>

    </section>
</template>


<style lang="scss" scoped>
.single-page {

    .jumbotron {
        height: 500px;
        background-color: blue;
        padding-top: 30rem;
        padding-bottom: 10rem;
        background-image: url('/img/wallpaper.png');
        background-repeat: repeat;
        background-size: cover;
    }

    .img-pos {
        width: 750px;
    }

    .skills {
        display: flex;
        flex-wrap: wrap;
        padding-right: 5rem;
        margin-left: 5rem;

        h6 {
            background: rgba(195, 195, 195, 0.718);
            padding: .7rem;
            margin: .3rem;
            border-radius: .2rem;
            transition: all .4s ease 0s;

            &:hover {
                cursor: default;
                background-color: #EE8B3A;
            }
        }
    }

}
</style>