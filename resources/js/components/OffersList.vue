<template>

    <div>
        <h2>Job offers</h2>

        <button class="btn btn-info mb-2" @click="getTests"> Update </button>

        <ul class="list-group">
            <li class="list-group-item" v-for="test in tests">
                {{test.name}}
                <br>
                <button class="btn btn-danger mb-2" @click="destroy(test)"> Delete </button>
            </li>
        </ul>
    </div>

</template>

<script>
    export default {
        name: 'OffersList',
        data(){
            return {
                tests: []
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
            }
        },

        mounted() {
            this.getTests();
        }
    }
</script>

<style scoped>

</style>
