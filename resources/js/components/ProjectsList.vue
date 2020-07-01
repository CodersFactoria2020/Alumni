<template>

    <div class="container">
        <div class="title-button">
            <h2>Proyectos</h2>
            <button class="button-1" @click="showModalCreate()"> Crear proyecto </button>
        </div>
        <div class="input-group search-s">
            <input class="form-control my-0 py-1 amber-border search-s" type="text" placeholder="Buscar proyecto..." aria-label="Search" v-model="search">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
        <br>
        
        <div v-bind:key="i" v-for="(project, i) in filteredProjects">
            <div class="card-alumni-s">
                <div class="card-head-s">
                    <h3>
                        {{project.title}}
                    </h3>
                    <div>
                        <a :href="'/proyectos/' + project.id" ><i class="fas fa-info icons-s button-s"></i></a>                        
                        <a @click="edit(project)"><i class="fa fa-edit icons-s button-s"></i></a>
                        <a @click="destroy(project)"><i class="fa fa-trash icons-s button-s"></i></a>
                    </div>
                </div>
                <hr>
                <div class="card-main-s">
                    <p>{{(project.description).slice(0, 150)}}...</p>
                    <div class="card-dates-s">
                        <p><b>Creado:</b> {{(project.created_at).slice(0, 10)}}</p>
                        <p><b>Última Actualización</b> {{(project.updated_at).slice(0, 10)}}</p>
                    </div>
                </div>
                <div class="card-foot-s">
                    <p :class="project.status.replace(/\s/g , '-').toLowerCase()">{{project.status}} </p>
                    <div class="tag-list-s">
                        <div class="tag-s" v-bind:key="n" v-for="(language, n) in project.languages">
                            <p>{{language.name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <pop-up popUpId="create">
            <form class="selector">
                <h3>Publica un proyecto</h3>
                <br>
                <label> Título:* </label>
                <input type="text" name="title" class="form-control" v-model="projectToBeCreated.title" required>
                <label> Descripción:* </label>
                <textarea name="description" class="form-control" v-model="projectToBeCreated.description" required></textarea>
                <label> Repositorio:* </label>
                <input type="text" name="repository" class="form-control" v-model="projectToBeCreated.repository" required>
                <label> Estado: </label>
                <select name="status"  class="form-control" v-model="projectToBeCreated.status" required>
                    <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state> {{status.state}} </option>
                </select>
                <label> Nombre de Usuario:* </label>
                <input type="text" name="username" class="form-control" v-model="projectToBeCreated.username" required>
                <label> E-mail:* </label>
                <input type="text" name="email" class="form-control" v-model="projectToBeCreated.email" required>
                <label> Etiquetas:* </label>
                <multiselect v-model="selectedLanguagesForCreate" :options="languageList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiqueta...">
                    <template slot="singleLabel" slot-scope="{ language }">{{ language.name }}</template>
                </multiselect>
                <br>
                <h6>
                    <p> *Campos requeridos </p>
                </h6>
                <br>
                <input class="button-1" type="submit" @click="create()" value="Crear">
            </form>
        </pop-up>

        <pop-up popUpId="details">
            <h5>{{project.title}}</h5><br>
            <h5>Descripción:</h5> {{project.description}} <br>
            <h5>Repositorio:</h5> {{project.repository}} <br>
            <h5>Estado:</h5> {{project.status}} <br>
            <h5>Nombre de Usario:</h5> {{project.username}} <br>
            <h5>E-mail:</h5> {{project.email}} <br>
            <h5>Etiquetas: </h5> <span v-bind:key="n" v-for="(language, n) in project.languages" > {{language.name}}, </span> <br>  
            <h5>Creado: </h5> {{project.created_at}} <br>    
            <h5>Actualizado: </h5> {{project.updated_at}}  <br> 
        </pop-up>

        <pop-up popUpId="edit">
            <form class="selector">
                <label> Título:* </label>
                <input type="text" name="title" class="form-control" v-model="project.title" required>
                <label>Descripción:* </label>
                <textarea name="description" class="form-control" v-model="project.description" required></textarea>
                <label> Repositorio:* </label>
                <input type="text" name="repository" class="form-control" v-model="project.repository" required>
                <label> Estado:* </label>
                <select name="status"  class="form-control" v-model="project.status" required>
                    <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state > {{status.state}} </option>
                </select>
                <label> Nombre de Usario:* </label>
                <input type="text" name="username" class="form-control" v-model="project.username" required>
                <label> E-mail:* </label>
                <input type="text" name="email" class="form-control" v-model="project.email" required>
                <label> Etiquetas:* </label>
                <multiselect v-model="selectedLanguagesForEdit" :options="languageList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiqueta...">
                    <template slot="singleLabel" slot-scope="{ language }">{{ language.name }}</template>
                </multiselect>
                <br>
                <h6>
                    <p> *Campos requeridos </p>
                </h6>
                <br>
                <input class="button-1" type="button" @click="update(project)" value="Actualizar">
            </form>
        </pop-up>

    </div>
</template>

<script>
    import PopUp from './PopUp';
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'ProjectsList',
        components: {
            Multiselect,
            PopUp
        },
        data(){
            return {
                projectList: [],
                project: {
                    languages: [],
                },
                projectToBeCreated: {
                    languages: []
                },
                
                search: '',

                languageList: [],
                selectedLanguages: null,
                selectedLanguagesForEdit: null,
                selectedLanguagesForCreate: null,

                statusList: [
                    {
                        state: 'In progress'
                    },
                    {
                        state: 'Achieved all goals'
                    },
                    {
                        state: 'Paused'
                    }
                ]
            }
        },

        methods: {
            getProjects() {
                axios.get('/api/projects').then(response =>{
                    this.projectList = response.data;
                });
            },
            clearProject() {
                this.projectToBeCreated = {};
            },
            showModalEdit(project) {
                this.project = project
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
            destroy(project) {
                if(confirm('¿Estas seguro que quieres borrar este proyecto?')) {
                    axios.delete('/api/projects/' + project.id).then(response =>{
                        this.getProjects();
                    })
                }
            },
            create() {
                this.projectToBeCreated.languages = this.selectedLanguagesForCreate;
                axios.post('/api/projects',this.projectToBeCreated).then(response =>{
                    this.getProjects();
                    this.clearProject();
                    this.closeModalCreate();
                });
            },
            edit(project) {
                axios.get('/api/projects/' + project.id).then(response =>{
                    this.selectedLanguagesForEdit = response.data.languages
                    this.showModalEdit(response.data);
                });
            },
            update(project) {
                this.project.languages = this.selectedLanguagesForEdit
                axios.patch('/api/projects/' + project.id, this.project).then(response =>{
                    this.getProjects();
                    this.closeModalEdit();
                    this.clearProject();
                });
            },
            getLanguages() {
                axios.get('/api/languages').then(response =>{
                    this.languageList = response.data;
                });
            },
            invertSort() {
                this.sortAsc = !this.sortAsc;
            },
        },
        computed: {
            filteredProjects() {
                return this.orderedProjectsByDate.filter((project) => {
                    return project.title.toLowerCase().match(this.search.toLowerCase());
                });
            },
            filteredProjectsByLanguages() {
                return this.projectList.filter((project) => {
                    return project.languages.includes(this.selectedLanguages);
                });
            },
            orderedProjectsByDate() {
                return _.orderBy(this.projectList,'created_at','desc')
            }
        },

        mounted() {
            this.getProjects();
            this.getLanguages();
        }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css">

</style>

