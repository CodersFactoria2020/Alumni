<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>

    <ul class="list-group">
      <li class="list-group-item" v-for="jobOffer in jobOfferList">
        <u>Position:</u> {{jobOffer.position}} <br>
        <u>Company ID:</u> {{jobOffer.company_id}} <br>
        <u>Location:</u> {{jobOffer.location}} <br>
        <u>Tags:</u> Laravel, PHP <br>
        <br>
        <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Delete </button>
        <button class="btn btn-primary mb-2" @click="showModalDetails(jobOffer)"> Show more </button>
      </li>
    </ul>

    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <label> Position: </label>
                    <input type="text" name="position" class="form-control" v-model="jobOffer.position">
                    <label> Company ID: </label>
                    <input type="number" name="company_id" class="form-control" v-model="jobOffer.company_id">
                    <label> Location: </label>
                    <input type="text" name="location" class="form-control" v-model="jobOffer.location">
                    <label> Description: </label>
                    <input type="text" name="description" class="form-control" v-model="jobOffer.description">
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
            <h5>Company ID:</h5> {{jobOffer.company_id}} <br>
            <h5>Location:</h5> {{jobOffer.location}} <br>
            <h5>Description:</h5> {{jobOffer.description}} <br>
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
                axios.get('/api/jobOffers').then(response =>{
                    this.jobOfferList = response.data;
                });
            },
            destroy(jobOffer) {
                axios.delete('/api/jobOffers/' + jobOffer.id).then(response =>{
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
                axios.post('/api/jobOffers',this.jobOffer).then(response =>{
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
