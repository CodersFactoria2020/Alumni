<template>

    <div>
        <h2>Job offers</h2>
        
        <button class="btn btn-info mb-2" @click="getTests"> Update </button>
        <button class="btn btn-primary mb-2" @click="showModal()"> Create </button>

        <ul class="list-group">
            <li class="list-group-item" v-for="test in tests">
                {{test.name}}
                <br>
                <button class="btn btn-danger mb-2" @click="destroy(test)"> Delete </button>
            </li>
        </ul>

        <div class="modal fade" id="create">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">                       
                        <label> Name: </label>
                        <input type="text" name="name" class="form-control" v-model="test.name">
                        <input type="submit" @click="create()">        
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'OffersList',
        data(){
            return {
                tests: [],
                test: {}
            }
        },

        methods: {
            getTests() {
                axios.get('/api/test').then(response =>{
                    this.tests = response.data; 
                });
            },
            destroy(test) {
                axios.delete('/api/test/' + test.id).then(response =>{
                    this.getTests();
                })
            },
            clearTest() {
                this.test = {};
            },
            showModal() {
                 $('#create').modal('show')
            },
            closeModal() {
                $('#create').modal('hide')
            },
            create() {
                axios.post('/api/test',this.test).then(response =>{
                    this.getTests();
                    this.clearTest();
                    this.closeModal();
                });
            }
        },

        mounted() {
            this.getTests();
        }
    }
</script>

<style scoped>

</style>
