<template>

    <div class="container">
        <div class="title-button">
            <h2>Ofertas de Trabajo</h2>
            <button class="button-1" @click="showModalCreate()"> Crear oferta </button>
        </div>

        <div class="input-group search-s">
            <input class="form-control my-0 py-1 amber-border search-s" type="text" placeholder="Buscar puesto..." aria-label="Search" v-model="search">
        </div>
        <br>
  
        <div v-bind:key="i" v-for="(jobOffer, i) in filteredJobOffers">
                <div class="card-alumni-s">
                    <div class="card-head-s">
                        <h3>
                            {{jobOffer.position}}
                        </h3>
                        <div>
                            <a :href="'/empleos/' + jobOffer.id"><i class="fas fa-info icons-s button-s"></i></a>                        
                            <a @click="edit(jobOffer)"><i class="fa fa-edit icons-s button-s"></i></a>
                            <a @click="destroy(jobOffer)"><i class="fa fa-trash icons-s button-s"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="card-main-s">

                        <p> {{(jobOffer.description).slice(0, 150)}}... </p>
                        <div class="card-dates-s">
                        <p> <b>Empresa:  </b>{{jobOffer.empresa.name}} </p>
                        <p> <b>Ubicación:  </b>{{jobOffer.location}} </p>
                        </div>
                        
                    </div>
                    <div class="card-foot-s">
                        <div class="tag-list-job-offer">
                            <div class="tag-s" v-bind:key="n" v-for="(language, n) in jobOffer.languages">
                                <p>{{language.name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <pop-up popUpId="create">
            <form class="selector">
                <h3>Publica una oferta de trabajo</h3>
                <br>
                <label> Puesto:* </label>
                <input type="text" name="position" class="form-control" v-model="jobOfferToBeCreated.position" required>
                <label> Empresa:* </label>
                <select name="empresa_id"  class="form-control" v-model="jobOfferToBeCreated.empresa_id" required>
                    <option v-bind:key="i" v-for="(empresa, i) in empresaList" :value=empresa.id> {{empresa.name}} </option>
                </select>
                <label> Ubicación:* </label>
                <input type="text" name="location" class="form-control" v-model="jobOfferToBeCreated.location" required>
                <label> Descripción:* </label>
                <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" v-model="jobOfferToBeCreated.description" required></textarea>
                <label> Etiquetas: </label>
                <multiselect v-model="selectedLanguagesForCreate" :options="languageList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag..." required>
                    <template slot="singleLabel" slot-scope="{ language }">{{ language.name }}</template>
                </multiselect>
                <br>
                <h6>
                    <p> *Campos requeridos </p>
                </h6>
                <br>
                <input class='button-1' type="submit" @click="create()" value="Crear">
            </form>
        </pop-up>

        <pop-up popUpId="details">
            <h5>{{jobOffer.position}}</h5><br>
            <h5>Empresa:</h5> {{jobOffer.empresa.name}} <br>
            <h5>Ubicación:</h5> {{jobOffer.location}} <br>
            <h5>Descripción:</h5> {{jobOffer.description}} <br>
            <u>Etiquetas:</u> <span v-bind:key="n" v-for="(language, n) in jobOffer.languages" > {{language.name}} </span>
        </pop-up>

        <pop-up popUpId="edit">
            <form class="selector">
                <label> Puesto:* </label>
                <input type="text" name="position" class="form-control" v-model="jobOffer.position" required>
                <label> Empresa:* </label>
                <select name="empresa_id"  class="form-control" v-model="jobOffer.empresa.id" required>
                    <option v-bind:key="i" v-for="(empresa, i) in empresaList" :value=empresa.id> {{empresa.name}} </option>
                </select>
                <label> Ubicación:* </label>
                <input type="text" name="location" class="form-control" v-model="jobOffer.location" required>
                <label> Descripción:* </label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="jobOffer.description" required></textarea>
                <label> Etiquetas:* </label>
                <multiselect v-model="selectedLanguagesForEdit" :options="languageList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiqueta...">
                    <template slot="singleLabel" slot-scope="{ language }">{{ language.name }}</template>
                </multiselect>
                <br>
                <h6>
                    <p> *Campos requeridos </p>
                </h6>
                <br>
                <input class='button-1' type="submit" @click="update(jobOffer)" value="Actualizar">
            </form>
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
                    languages: [],
                },
                jobOfferToBeCreated: {
                    languages: []
                },

                search: '',

                empresaList: [],

                languageList: [],
                selectedLanguages: null,
                selectedLanguagesForEdit: null,
                selectedLanguagesForCreate: null,
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
            
            destroy(jobOffer) {
                if(confirm('¿Estas seguro que quieres borrar esta oferta de trabajo? ')) {
                    axios.delete('/api/jobOffers/' + jobOffer.id).then(response =>{
                        
                        this.getJobOffers();
                    })
                }
            },
            create() {
                this.jobOfferToBeCreated.languages = this.selectedLanguagesForCreate;
                axios.post('/api/jobOffers',this.jobOfferToBeCreated).then(response =>{
                    this.getJobOffers();
                    this.clearJobOffer();
                    this.closeModalCreate();
                });
            },
            edit(jobOffer) {
                axios.get('/api/jobOffers/' + jobOffer.id).then(response =>{
                    this.selectedLanguagesForEdit = response.data.languages
                    this.showModalEdit(response.data);
                });
            },
            update(jobOffer) {
                this.jobOffer.languages = this.selectedLanguagesForEdit
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
            getLanguages() {
                axios.get('/api/languages').then(response =>{
                    this.languageList = response.data;
                });
            },
        },

        computed: {
            filteredJobOffers() {
                return this.orderedJobOffersByDate.filter((jobOffer) => {
                    return jobOffer.position.toLowerCase().match(this.search.toLowerCase());
                });
            },
            orderedJobOffersByDate() {
                return _.orderBy(this.jobOfferList,'created_at','desc')
            }
        },

        mounted() {
            this.getJobOffers();
            this.getEmpresas();
            this.getLanguages();
        }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>

