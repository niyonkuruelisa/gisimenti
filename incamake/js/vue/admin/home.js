new Vue({
    el: '#app',
    data: {
        videos: [],
        categories: [],
        totalMovies:'',
        totalSubscribers:'',
        totalClients:'',

        
    },
    mounted() {
        this.getSummary()
        this.getCategories()
        this.getVideos()
    
    },
    methods: {
        async getVideos(){

            const params = {
                action: 'getVideos'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.videos = []
                    this.videos = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
        async getSummary(){

            const params = {
                action: 'getSummary'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {

                    this.totalMovies        = result.data.totalMovies
                    this.totalSubscribers   = result.data.totalSubscribers
                    this.totalClients       = result.data.totalClients

                },
                error => {
                    console.log(error)
                }
            )
        },
        async getCategories(){

            const params = {
                action: 'getCategories'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.categories = []
                    this.categories = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
    },
})