new Vue({
    el: '#app',
    data: {
        genres : [],
        selected: false,
        videoId: '',
        title: '',
        title_english: '',
        description_intro: '',
        description_full: '',
        year_released: '',
        movie_language: '',
        size: '',
        loaded: '',
        progress: '',
        runtime: '',
        youtube_code: '',
        selected:  null,
        checkedGenres: [],
        savedChanges:true,
        times: 0,
        thumbnail:'Upload Thumbnail',
        thumbnailSource: '',
        thumbnailToUpload: {},
        tota: '',
    },
    mounted() {
        this.getGenres()
    },
    methods: {
        
        async getGenres(){
            const params = {
                action: 'getGenres'
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.genres = []
                    this.genres = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
        somethingChanged(){
            this.savedChanges = false
        },
         //set an interval
        async saveMovieData(){
            var params = {
                action : 'saveMovieData',
                videoId: this.videoId,
                genres : this.checkedGenres,
                title: this.title,
                title_english: this.title_english,
                description_intro: this.description_intro,
                description_full: this.description_full,
                year_released: this.year_released,
                movie_language: this.movie_language,
                runtime: (this.runtime / 60).toFixed(0)+" Min",
                time:converter((this.runtime / 60).toFixed(2)),
                youtube_code: this.youtube_code,
                size: this.size,
            }
            console.log(params)
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    //console.log(result.data)
                    this.savedChanges = true
                    console.log(result.data)
                    
                },
                error => {
                    console.log(error)
                }
            )
        },
        uploadThumbnail(){
            this.thumbnailToUpload = this.$refs.images.files[0];
            var saved = false
            var thumbnail = this.thumbnailToUpload
            var videoID = this.videoId
            setInterval(function (){

                if(videoID != "" && saved == false){
                    this.thumbnail = thumbnail.name
                    //console.log(thumbnail)
                    const form = new FormData()
                    form.append('thumbnail',thumbnail)
                    form.append('name',thumbnail.name)
                    form.append('movieId',videoID)

                    axios.post(window.URLROOT+'api/upload.php',form).then(
                        result => {
                            //console.log(result.data)
                            if(result.data == false){
                                //window.history.back();
                            }else{
                                console.log("Uploaded Thumbnail")
                                this.saveMovieData()
                            }
                            saved = true
                            videoID = ""
                            
                        },
                        error => {
                            console.log(error)
                        }
                    )
                }
            },1000)



            
        },
        upload(){
            
            const video = this.$refs.videos.files[0];
            const form = new FormData()
            form.append('video',video)
            form.append('name',video.name)
            form.append('size',video.size)
            form.append('type',video.type)
            form.append('action','saveVideo')
            if(video.type.includes('video')){
                //check size
                //sconsole.log(video.size)
                
                if(video.size < 4000000012){
                    this.selected = true;
                    this.progress  = 0
                    this.title = video.name.split('.').slice(0, -1).join('.')
                    this.title_english =this.title 
                    this.size = bytesToSize(video.size,1)
                    //check duration video
                    var vid = document.createElement('video');
                    var fileURL = URL.createObjectURL(video);
                    vid.src = fileURL;
                    vid.ondurationchange = ()=> {
                        this.runtime = vid.duration
                    }
                    
                    axios.post(window.URLROOT+'api/upload.php',form,{
                        onUploadProgress: (event) => {
                            this.loaded = bytesToSize(event.loaded,1)
                            this.progress = Math.ceil((event.loaded / event.total )*  100)
                            //console.log(Math.ceil((event.loaded / event.total )*  100))
                        }
                    }).then(
                        result => {
                            console.log(result.data)
                            this.videoId = result.data.id
                            console.log(result.data.id)
                            if(this.videoId != ""){
                                this.saveMovieData()
                            }
                        },
                        error => {
                            console.log(error)
                            this.upload()
                        }
                    )
                }else{
                    alert("THIS VIDEO IS TOO BIG,TRY SMALL ONE")
                }
            }else{
                this.selected = false
                alert('CHOOSE A VIDEO')
            }
            
        }
        
    }
 })
 function bytesToSize(bytes,decimals) {
    if(bytes == 0) return '0 Bytes';
    var k = 1024,
        dm = decimals <= 0 ? 0 : decimals || 2,
        sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
        i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
 }
 function converter(num){
    var num = num+""
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var min = (hours - rhours) * 60;
    var minPoint = num.split(".")[1]
    var rminutes = Math.floor(min);
    var secs = Math.floor((minPoint * 60) / 100)
    
    return rhours+":"+rminutes+":"+secs
}