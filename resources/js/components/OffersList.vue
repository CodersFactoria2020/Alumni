<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>

    <ul class="list-group">
      <li class="list-group-item" v-for="jobOffer in jobOfferList">
        <u>Position:</u> {{jobOffer.position}} <br>
        <u>Company ID:</u> {{jobOffer.empresa.name}} <br>
        <u>Location:</u> {{jobOffer.location}} <br>
        <u>Tags:</u> Laravel, PHP <br>
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
            <label> Position: </label>
            <input type="text" name="position" class="form-control" v-model="jobOfferToBeCreated.position">
            <label> Company ID: </label>
            <input type="number" name="empresa_id" class="form-control" v-model="jobOfferToBeCreated.empresa">
            <label> Location: </label>
            <input type="text" name="location" class="form-control" v-model="jobOfferToBeCreated.location">
            <label> Description: </label>
            <input type="text" name="description" class="form-control" v-model="jobOfferToBeCreated.description">
            <input type="submit" @click="create()">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="details">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h5>{{jobOffer.position}}</h5><br>
            <h5>Company ID:</h5> {{jobOffer.empresa.name}} <br>
            <h5>Location:</h5> {{jobOffer.location}} <br>
            <h5>Description:</h5> {{jobOffer.description}} <br>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <label> Position: </label>
            <input type="text" name="position" class="form-control" v-model="jobOffer.position">
            <label> Company ID: </label>
            <input type="number" name="empresa_id" class="form-control" v-model="jobOffer.empresa">
            <label> Location: </label>
            <input type="text" name="location" class="form-control" v-model="jobOffer.location">
            <label> Description: </label>
            <input type="text" name="description" class="form-control" v-model="jobOffer.description">
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
