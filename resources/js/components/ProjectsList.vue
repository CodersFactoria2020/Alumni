<template>

    <div>
        <h2>Proyectos</h2>

    <button class="btn btn-info mb-2" @click="getProjects"> Actualizar </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Crear </button>
    <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Buscar proyecto..." aria-label="Search" v-model="search">
    </div>
    <br>
   <multiselect v-model="selectedTags" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiquetas...">
        <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
    </multiselect> 

    <br>
    <div v-if= "selectedTags">
        <ul class="list-group">
                <li class="list-group-item" v-bind:key="i" v-for="(projects, i) in filteredProjectsByTags">
                    <u>Título:</u> {{projects.title}} <br>
                    <u>Descripción:</u> {{(projects.description).slice(0, 150)}}... <br>
                    <u>Estado:</u> {{projects.status}} <br>
                    <u>Etiquetas:</u> <span v-bind:key="n" v-for="(tag, n) in projects.tags" > {{tag.name}}, </span>
                    <br>
                    <u>Creado:</u> {{(projects.created_at).slice(0, 10)}} /
                    <u>Actualizado:</u> {{(projects.updated_at).slice(0, 10)}} <br>
                    <button class="btn btn-danger mb-2" @click="destroy(projects)"> Eliminar </button>
                    <button class="btn btn-secondary mb-2" @click="edit(projects)"> Editar </button>
                    <button class="btn btn-primary mb-2" @click="showModalDetails(projects)"> Mostrar mas </button>
                </li>
        </ul>
    </div>
    <div v-else>
        <ul class="list-group">
                <li class="list-group-item" v-bind:key="i" v-for="(projects, i) in filteredProjects">
                    <u>Título:</u> {{projects.title}} <br>
                    <u>Descripción:</u> {{(projects.description).slice(0, 150)}}... <br>
                    <u>Estado:</u> {{projects.status}} <br>
                    <u>Etiquetas:</u> <span v-bind:key="n" v-for="(tag, n) in projects.tags" > {{tag.name}}, </span>
                    <br>
                    <u>Creado:</u> {{(projects.created_at).slice(0, 10)}} /
                    <u>Actualizado:</u> {{(projects.updated_at).slice(0, 10)}} <br>
                    <button class="btn btn-danger mb-2" @click="destroy(projects)"> Eliminar </button>
                    <button class="btn btn-secondary mb-2" @click="edit(projects)"> Editar </button>
                    <button class="btn btn-primary mb-2" @click="showModalDetails(projects)"> Muestra mas </button>
                </li>
        </ul>
    </div>

    <pop-up popUpId="create">
        <label> Título: </label>
        <input type="text" name="title" class="form-control" v-model="projectToBeCreated.title">
        <label> Descripción: </label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="projectToBeCreated.description"></textarea>
         <label> Repositorio: </label>
        <input type="text" name="repository" class="form-control" v-model="projectToBeCreated.repository">
        <label> Estado: </label>
        <select name="status"  class="form-control" v-model="projectToBeCreated.status">
            <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state> {{status.state}} </option>
        </select>
        <label> Nombre de Usario: </label>
        <input type="text" name="username" class="form-control" v-model="projectToBeCreated.username">
        <label> E-mail: </label>
        <input type="text" name="email" class="form-control" v-model="projectToBeCreated.email">
        <label> Etiquetas: </label>
        <multiselect v-model="selectedTagsForCreate" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>

        <br>
        <input type="submit" @click="create()" value="Crear">
    </pop-up>

    <pop-up popUpId="details">
        <h5>{{project.title}}</h5><br>
        <h5>Descripción:</h5> {{project.description}} <br>
        <h5>Repositorio:</h5> {{project.repository}} <br>
        <h5>Estado:</h5> {{project.status}} <br>
        <h5>Nombre de Usario:</h5> {{project.username}} <br>
        <h5>E-mail:</h5> {{project.email}} <br>
        <h5>Etiquetas: </h5> <span v-bind:key="n" v-for="(tag, n) in project.tags" > {{tag.name}}, </span> <br>  
        <h5>Creado: </h5> {{project.created_at}} <br>    
        <h5>Actualizado: </h5> {{project.updated_at}}  <br> 

    </pop-up>

    <pop-up popUpId="edit">
        <label> Título: </label>
        <input type="text" name="title" class="form-control" v-model="project.title">
        <label>Descripción: </label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="project.description"></textarea>
        <label> Repositorio: </label>
        <input type="text" name="repository" class="form-control" v-model="project.repository">
        <label> Estado: </label>
        <select name="status"  class="form-control" v-model="project.status">
            <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state > {{status.state}} </option>
        </select>
        <label> Nombre de Usario: </label>
        <input type="text" name="username" class="form-control" v-model="project.username">
        <label> E-mail: </label>
        <input type="text" name="email" class="form-control" v-model="project.email">

         <multiselect v-model="selectedTagsForEdit" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Elige etiquetas...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>



        <input type="submit" @click="update(project)" value="Actualizar">
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
                    tags: [],
                },
                projectToBeCreated: {
                    tags: []
                },
                

                search: '',

                tagList: [],
                selectedTags: null,
                selectedTagsForEdit: null,
                selectedTagsForCreate: null,

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
            showModalDetails(project) {
                this.project = project
                //this.project.updated_at= (project.updated_at).slice(0, 150)
                $('#details').modal('show')
            },
            destroy(project) {
                axios.delete('/api/projects/' + project.id).then(response =>{
                    this.getProjects();
                })
            },
            create() {
                this.projectToBeCreated.tags = this.selectedTagsForCreate;
                axios.post('/api/projects',this.projectToBeCreated).then(response =>{
                    this.getProjects();
                    this.clearProject();
                    this.closeModalCreate();
                });
            },
            edit(project) {
                axios.get('/api/projects/' + project.id).then(response =>{
                    this.selectedTagsForEdit = response.data.tags
                    this.showModalEdit(response.data);
                });
            },
            update(project) {
                this.project.tags = this.selectedTagsForEdit
                axios.patch('/api/projects/' + project.id, this.project).then(response =>{
                    this.getProjects();
                    this.closeModalEdit();
                    this.clearProject();
                });
            },
            getTags() {
                axios.get('/api/tags').then(response =>{
                    this.tagList = response.data;
                });
            },
        },
        computed: {
            filteredProjects() {
                return this.projectList.filter((project) => {
                    return project.title.toLowerCase().match(this.search.toLowerCase());
                });
            },
            filteredProjectsByTags() {
                return this.projectList.filter((project) => {
                    return project.tags.includes(this.selectedTags);
                });
            }

           
            
        },

        mounted() {
            this.getProjects();
            this.getTags();
        }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

