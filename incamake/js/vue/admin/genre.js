
path = '<?php echo(URLROOT);?>';
new Vue({
    el: '#app',
    data: {
        genres: [],
        isEdit: false,
        id: '',
        genreName: '',
        path: 'http://localhost/afrodrama/api/'
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
                    console.log(result.data)
                    this.genres = []
                    this.genres = result.data
                },
                error => {
                    console.log(error)
                }
            )
        },
        async addNewGenre(){
            await axios.post(window.URLROOT+'api/',{action: 'addGenre', name: this.genreName}).then(
                result => {
                    //console.log(result.data)
                    if(result.data.exist){
                        alert('Genre alredy Exists');
                    }else{
                        this.genreName = ''
                        this.getGenres()
                    }
                },
                error => {
                    console.log(error)
                }
            )
        },
        async deleteGenre(index){
            await axios.post(window.URLROOT+'api/',{action: 'deleteGenre',id : index}).then(
                result => {
                    console.log(result.data)
                    this.getGenres()
                },
                error => {
                    console.log(error)
                }
            )
        },
        async editGenre(name,index){
            this.id = index
            this.genreName = name
            this.isEdit = true;
        },
        async updateGenre(){
            const params = {
                action : 'updateGenre',
                id : this.id,
                name: this.genreName
            }
            await axios.post(window.URLROOT+'api/',params).then(
                result => {
                    console.log(result.data)
                    this.isEdit = false
                    this.getGenres()
                },
                error => {
                    console.log(error)
                }
            )
        }
    }
 })

