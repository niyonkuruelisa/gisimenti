new Vue({
    el: '#app',
    data: {
        genresAll: [],
        movie: {},
        videoId: '',
        isEdit: false,
        genres : [],
        videoId: '',
        title: '',
        title_english: '',
        description_intro: '',
        description_full: '',
        year_released: '',
        movie_language: '',
        size: '',
        url: '',
        loaded: '',
        progress: '',
        runtime: '',
        youtube_code: '',
        selected:  null,
        checkedGenres: [],
        savedChanges:false,
        times: 0,
        thumbnail:'Upload Thumbnail',
        thumbnailSource: '',
        categories : [],
        //upcoming videos
        upcomings:[],
    },
    mounted() {
        this.getCategories()
        this.getVideo()
        this.upComingVideos()
        this.getGenres()
    },
    methods: {
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
        async upComingVideos(){
            const params = {
                action: 'getUpcomingVideos',
                movieID: id
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.upcomings = []
                    this.upcomings = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
        async getVideo(){
            //console.log(id)
            const params = {
                action: 'getVideo',
                 //id from details.php before js
                videoId: id
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data )
                    if(result.data == false){

                        window.history.back();
                    }else{
                        this.movie =[]
                        this.movie = result.data
                        this.videoId = this.movie.id
                        this.title = this.movie.title
                        this.title_english = this.movie.title_english
                        this.description_intro = this.movie.description_intro
                        this.description_full = this.movie.description_full
                        this.year_released = this.movie.year
                        this.movie_language = this.movie.language
                        this.size = this.movie.size
                        this.runtime = this.movie.runtime
                        this.youtube_code = this.movie.yt_trailer_code
                        this.checkedGenres = this.movie.genres
                        this.url =  result.data.url
                        setTimeout(() => {
                            player  = new Plyr('#player', {
                                autoplay: true,
                            });
                         }, 500);
                    }
                    
                },
                error => {
                    console.log(error)
                }
            )
        },
        checkVideoURLFirst(url){
            if(jQuery.isEmptyObject(url)){
                return this.url
            }else{
                return url;
            }
        },
        async getGenres(){
            const params = {
                action: 'getGenres'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.genresAll = []
                    this.genresAll = result.data
                    //console.log(this.genresAll)
                },
                error => {
                    console.log(error)
                }
            )
        },
        
    },
}) 
 