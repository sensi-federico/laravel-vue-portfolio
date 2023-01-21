
import { reactive } from 'vue'
import axios from 'axios'

export const store = reactive({

    projects: '',
    loading: true,
    base_api_url: 'http://localhost:8000',

    callAxios(url) {
        axios
            .get(url)
            .then(response => {
                console.log(response);
                this.projects = response.data.results
                this.loading = false
            })
            .cacth(error => {
                console.error(error)
                this.error = error.message
                this.loading = false
            })
    },
    getImagePath(path) {
        if (path) {
            return this.base_api_url + '/storage/' + path
        }
        return 'img/placeholder.png'
    }
})