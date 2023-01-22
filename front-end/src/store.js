
import { reactive } from 'vue'
import axios from 'axios'

export const store = reactive({

    projects: '',
    skills: '',
    loading: true,
    base_api_url: 'http://localhost:8000',

    callAxios(url, name) {
        if (name == 'projects') {
            axios
                .get(url)
                .then(response => {
                    console.log(response);
                    this.projects = response.data.results
                    this.loading = false
                })
                .catch(error => {
                    console.error(error)
                    this.error = error.message
                    this.loading = false
                })
        } else if (name == 'skills') {
            axios
                .get(url)
                .then(response => {
                    console.log(response);
                    this.skills = response.data.results
                    this.loading = false
                })
                .catch(error => {
                    console.error(error)
                    this.error = error.message
                    this.loading = false
                })
        }
    },
    getImagePath(path) {
        if (path) {
            return this.base_api_url + '/storage/' + path
        }
        return 'img/placeholder.png'
    }
})