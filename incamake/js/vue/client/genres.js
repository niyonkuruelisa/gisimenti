new Vue({
    el: '#app',
    data: {
        videos: [],
        categories: [],
        genre:window.genre,
    },
    mounted() {
        this.getCategories()
        this.getVideos()
    },
    methods: {
        async getCategories(){
            const params = {
                action: 'getCategories'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    console.log(result.data)
                    this.categories = []
                    this.categories = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
        async getVideos(){
            const params = {
                action: 'getVideosByGenre',
                genre: this.genre

            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    console.log(result.data)
                    this.videos = []
                    this.videos = result.data
                },
                error => {
                    console.log(error)
                }
            )
        }
    },
})