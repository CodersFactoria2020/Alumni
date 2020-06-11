<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>

    <ul class="list-group">
      <li class="list-group-item" v-for="jobOffer in jobOfferList">
        {{jobOffer.name}}
        <br>
        <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Delete </button>
        <button class="btn btn-secondary mb-2" @click="edit(jobOffer.id)"> Edit </button>
        <button class="btn btn-primary mb-2" @click="showModalDetails(jobOffer)"> Show more </button>
      </li>
    </ul>

    <div class="modal fade" id="create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <label> Name: </label>
            <input type="text" name="name" class="form-control" v-model="jobOfferToBeCreated.name">
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

    <div class="modal fade" id="edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <label> Name: </label>
            <input type="text" name="name" class="form-control" v-model="jobOffer.name">
            <input type="submit" @click="update(jobOffer)">
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
                jobOffer: {},
                jobOfferToBeCreated: {},
            }
        },

        methods: {
            getJobOffers() {
                axios.get('/api/jobOffers').then(response =>{
                    this.jobOfferList = response.data; 
                });
            },
            clearJobOffer() {
                this.jobOfferToBeCreated = {};
                this.jobOffer = {};
            },
            showModalEdit(jobOffer) {
                this.jobOffer = jobOffer
                $('#edit').modal('show')
            },
            showModalCreate() {
                $('#create').modal('show')
            },
            closeModalCreate() {
                $('#create').modal('hide')
            },
            closeModalEdit() {
                $('#edit').modal('hide')
            },
            showModalDetails(jobOffer) {           
                this.jobOffer = jobOffer
                $('#details').modal('show')
            },
            destroy(jobOffer) {
                axios.delete('/api/jobOffers/' + jobOffer.id).then(response =>{
                    this.getJobOffers();
                })
            },
            create() {
                axios.post('/api/jobOffers',this.jobOfferToBeCreated).then(response =>{
                    this.getJobOffers();
                    this.clearJobOffer();
                    this.closeModalCreate();
                });
            },
            edit(id) {
                axios.get('/api/jobOffers/' + id).then(response =>{
                    this.showModalEdit();
                    this.jobOffer = response.data;
                });
            },
            update(jobOffer) {
                axios.patch('/api/jobOffers/' + jobOffer.id, this.jobOffer).then(response =>{
                    this.getJobOffers();
                    this.closeModalEdit();
                    this.clearJobOffer();
                });
            }
        },

        mounted() {
          this.getJobOffers();
        }
    }
</script>

<style scoped>
</style>
