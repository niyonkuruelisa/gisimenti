new Vue({
    el: '#app',
    data: {
        videos: [],
        categories: [],
        //settings info
        myName: '',
        myEmail: '',
        myAddress: '',
        user:{}
    },
    mounted() {
        
        this.getMyInfo()
        this.getCategories()
        this.getVideos()
    },
    methods: {
        async updateInfo(){
            
            if(window.ddddddddd){
                
                const params = {
                    action: 'updateInfo',
                    code: window.ddddddddd,
                    email: this.myEmail,
                    names: this.myName,
                    address: this.myAddress,
                }
                await axios.post(window.URLROOT+'api/',params).then(
                    result => {
                        if(result.data.success){
                            this.getMyInfo();
                        }else{
                            alert("Can't update now, try after sometimes.")
                        }
                    },
                    error => {
                        console.log(error)
                    }
                )
            }
            
        },
        async getMyInfo(){
            
            if(window.ddddddddd){
                
                const params = {
                    action: 'getMyInfo',
                    code: window.ddddddddd
                }
                await axios.post(window.URLROOT+'api/',params).then(
                    result => {
                        this.user = result.data
                        this.myName = result.data.names
                        this.myEmail = result.data.email
                        this.myAddress  =result.data.location
                    },
                    error => {
                        console.log(error)
                    }
                )
            }
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
        }
    },
})