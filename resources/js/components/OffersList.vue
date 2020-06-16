<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>
    <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search position..." aria-label="Search" v-model="search">
    </div>
    <br>
    <multiselect v-model="selectedTags" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
        <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
    </multiselect>

    <br>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-bind:key="i" v-for="(jobOffer, i) in filteredJobOffers">
                <u>Position:</u> {{jobOffer.position}} <br>
                <u>Company:</u> {{jobOffer.empresa.name}} <br>
                <u>Location:</u> {{jobOffer.location}} <br>
                <u>Tags:</u> Laravel, PHP <br>
                <br>
                <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Delete </button>
                <button class="btn btn-secondary mb-2" @click="edit(jobOffer)"> Edit </button>
                <button class="btn btn-primary mb-2" @click="showModalDetails(jobOffer)"> Show more </button>
            </li>
        </ul>
    </div>

    <pop-up popUpId="create">
        <label> Position: </label>
        <input type="text" name="position" class="form-control" v-model="jobOfferToBeCreated.position">
        <label> Company: </label>
        <select name="empresa_id"  class="form-control" v-model="jobOfferToBeCreated.empresa_id">
            <option v-bind:key="i" v-for="(empresa, i) in empresaList" :value=empresa.id> {{empresa.name}} </option>
        </select>
        <label> Location: </label>
        <input type="text" name="location" class="form-control" v-model="jobOfferToBeCreated.location">
        <label> Description: </label>
        <input type="text" name="description" class="form-control" v-model="jobOfferToBeCreated.description">
        <input type="submit" @click="create()">
    </pop-up>

    <pop-up popUpId="details">
        <h5>{{jobOffer.position}}</h5><br>
        <h5>Company:</h5> {{jobOffer.empresa.name}} <br>
        <h5>Location:</h5> {{jobOffer.location}} <br>
        <h5>Description:</h5> {{jobOffer.description}} <br>
    </pop-up>

    <pop-up popUpId="edit">
        <label> Position: </label>
        <input type="text" name="position" class="form-control" v-model="jobOffer.position">
        <label> Company ID: </label>
        <input type="number" name="empresa_id" class="form-control" v-model="jobOffer.empresa.id">
        <label> Location: </label>
        <input type="text" name="location" class="form-control" v-model="jobOffer.location">
        <label> Description: </label>
        <input type="text" name="description" class="form-control" v-model="jobOffer.description">
        <input type="submit" @click="update(jobOffer)">
    </pop-up>

  </div>

</template>

<script>
    import PopUp from './PopUp';
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'OffersList',
        components: {
            Multiselect,
            PopUp
        },
        data(){
            return {
                jobOfferList: [],
                jobOffer: {
                    empresa: {
                        }
                },
                jobOfferToBeCreated: {},

                search: '',

                empresaList: [],

                tagList: [],
                selectedTags: null,
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
            edit(jobOffer) {
                axios.get('/api/jobOffers/' + jobOffer.id).then(response =>{
                    this.showModalEdit(response.data);
                });
            },
            update(jobOffer) {
                axios.patch('/api/jobOffers/' + jobOffer.id, this.jobOffer).then(response =>{
                    this.getJobOffers();
                    this.closeModalEdit();
                    this.clearJobOffer();
                });
            },
            getEmpresas() {
                axios.get('/api/empresas').then(response =>{
                    this.empresaList = response.data;
                });
            },
            getTags() {
                axios.get('/api/tags').then(response =>{
                    this.tagList = response.data;
                });
            },
        },
        computed: {
            filteredJobOffers() {
                return this.jobOfferList.filter((jobOffer) => {
                    return jobOffer.position.toLowerCase().match(this.search.toLowerCase());
                });
            }
        },

        mounted() {
          this.getJobOffers();
          this.getEmpresas();
          this.getTags();
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
