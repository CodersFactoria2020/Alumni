<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>

    <ul class="list-group">
      <li class="list-group-item" v-bind:key="jobOffer" v-for="jobOffer in jobOfferList">
        {{jobOffer.name}}
        <br>
        <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Delete </button>
        <button class="btn btn-primary mb-2" @click="showModalDetails(jobOffer)"> Show more </button>
      </li>
    </ul>

    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">                       
                    <label> Name: </label>
                    <input type="text" name="name" class="form-control" v-model="jobOffer.name">
                    <input type="submit" @click="create()">        
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="details">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            {{jobOffer.id}}
            {{jobOffer.name}}
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
                jobOfferList: [],
                jobOffer: {}
            }
        },

        methods: {
            getJobOffers() {
                axios.get('/api/test').then(response =>{
                    this.jobOfferList = response.data; 
                });
            },
            destroy(jobOffer) {
                axios.delete('/api/test/' + jobOffer.id).then(response =>{
                    this.getJobOffers();
                })
            },
            clearJobOffer() {
                this.jobOffer = {};
            },
            showModalCreate() {
                 $('#create').modal('show')
            },
            closeModalCreate() {
                $('#create').modal('hide')
            },
            showModalDetails(jobOffer) {           
                this.jobOffer = jobOffer
                $('#details').modal('show')
            },
            create() {
                axios.post('/api/test',this.jobOffer).then(response =>{
                    this.getJobOffers();
                    this.clearJobOffer();
                    this.closeModalCreate();
                });
            },
        },

        mounted() {
          this.getJobOffers();
        }
    }
</script>

<style scoped>
</style>
