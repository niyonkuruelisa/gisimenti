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
    },
    mounted() {
        this.getVideo()
        this.getGenres()
    },
    filters: {
        ifInArray: function (value) {
            return this.genresAll.indexOf(value) > -1 ? 'checked' : '';
        }
    },
    methods: {
        async saveChanges(){
            var params = {
                action : 'updateMovieData',
                videoId: this.videoId,
                // genres : this.checkedGenres,
                title: this.title,
                title_english: this.title_english,
                description_intro: this.description_intro,
                description_full: this.description_full,
                year_released: this.year_released,
                movie_language: this.movie_language,
                youtube_code: this.youtube_code,
            }
            console.log(params)
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    console.log(result.data)
                    if(result.data.success){
                        this.setEdit()
                        this.getGenres()
                        this.getVideo()

                    }else{
                        alert("Something Went Wrong");
                    }
                },
                error => {
                    console.log(error)
                }
            )
        },
        async getVideo(){
            console.log(this.videoId)
            const params = {
                action: 'getVideo',
                 //id from details.php before js
                videoId: id
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    
                    if(result.data == false){
                        //window.history.back();
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
                        
                        
                        
                    }
                    
                },
                error => {
                    console.log(error)
                }
            )
        },
        checkVideoURLFirst(url){
            if(jQuery.isEmptyObject( url)){
                return this.url
            }else{
                return url;
            }
        },
        setEdit(){
            this.isEdit = !this.isEdit
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
                    console.log(this.genresAll)
                    
                },
                error => {
                    console.log(error)
                }
            )
        },
        somethingChanged(){
            this.savedChanges = false
        },
        
    },
}) 
 