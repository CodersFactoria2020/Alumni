<template>

    <div>
        <h2>Ofertas de Trabajo</h2>

    <button class="btn btn-info mb-2" @click="getJobOffers"> Actualizar </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Crear </button>
    <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Buscar puesto..." aria-label="Search" v-model="search">
    </div>
    <br>
    <multiselect v-model="selectedTags" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiqueta...">
        <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
    </multiselect>

    <br>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-bind:key="i" v-for="(jobOffer, i) in filteredJobOffers">
                <u>Puesto:</u> {{jobOffer.position}} <br>
                <u>Empresa:</u> {{jobOffer.empresa.name}} <br>
                <u>Ubicación:</u> {{jobOffer.location}} <br>
                <u>Descripción:</u> {{(jobOffer.description).slice(0, 150)}}... <br>
                <u>Etiquetas:</u> <span v-bind:key="n" v-for="(tag, n) in jobOffer.tags" > {{tag.name}}, </span>
                <br>
                <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Eliminar </button>
                <button class="btn btn-secondary mb-2" @click="edit(jobOffer)"> Editar </button>
                <button class="btn btn-primary mb-2" @click="showModalDetails(jobOffer)"> Mostrar mas </button>
            </li>
        </ul>
    </div>

    <pop-up popUpId="create">
        <label> Puesto: </label>
        <input type="text" name="position" class="form-control" v-model="jobOfferToBeCreated.position">
        <label> Empresa: </label>
        <select name="empresa_id"  class="form-control" v-model="jobOfferToBeCreated.empresa_id">
            <option v-bind:key="i" v-for="(empresa, i) in empresaList" :value=empresa.id> {{empresa.name}} </option>
        </select>
        <label> Ubicación: </label>
        <input type="text" name="location" class="form-control" v-model="jobOfferToBeCreated.location">
        <label> Descripción: </label>
        <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" v-model="jobOfferToBeCreated.description"></textarea>
        <label> Etiquetas: </label>
        <multiselect v-model="selectedTagsForCreate" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>
        <br>
        <input type="submit" @click="create()" value="Crear">
    </pop-up>

    <pop-up popUpId="details">
        <h5>{{jobOffer.position}}</h5><br>
        <h5>Empresa:</h5> {{jobOffer.empresa.name}} <br>
        <h5>Ubicación:</h5> {{jobOffer.location}} <br>
        <h5>Descripción:</h5> {{jobOffer.description}} <br>
        <u>Etiquetas:</u> <span v-bind:key="n" v-for="(tag, n) in jobOffer.tags" > {{tag.name}} </span>
    </pop-up>

    <pop-up popUpId="edit">
        <label> Puesto: </label>
        <input type="text" name="position" class="form-control" v-model="jobOffer.position">
        <label> Empresa: </label>
        <select name="empresa_id"  class="form-control" v-model="jobOffer.empresa.id">
            <option v-bind:key="i" v-for="(empresa, i) in empresaList" :value=empresa.id> {{empresa.name}} </option>
        </select>
        <label> Ubicación: </label>
        <input type="text" name="location" class="form-control" v-model="jobOffer.location">
        <label> Descripción: </label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="jobOffer.description"></textarea>
         <multiselect v-model="selectedTagsForEdit" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>
        <input type="submit" @click="update(jobOffer)" value="Actualizar">
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
                    },
                    tags: [],
                },
                jobOfferToBeCreated: {
                    tags: []
                },

                search: '',

                empresaList: [],

                tagList: [],
                selectedTags: null,
                selectedTagsForEdit: null,
                selectedTagsForCreate: null,
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
                this.jobOfferToBeCreated.tags = this.selectedTagsForCreate;
                axios.post('/api/jobOffers',this.jobOfferToBeCreated).then(response =>{
                    this.getJobOffers();
                    this.clearJobOffer();
                    this.closeModalCreate();
                });
            },
            edit(jobOffer) {
                axios.get('/api/jobOffers/' + jobOffer.id).then(response =>{
                    this.selectedTagsForEdit = response.data.tags
                    this.showModalEdit(response.data);
                });
            },
            update(jobOffer) {
                this.jobOffer.tags = this.selectedTagsForEdit
                this.jobOffer.empresa_id = jobOffer.empresa.id
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

