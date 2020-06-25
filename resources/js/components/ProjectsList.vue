<template>

    <div>
        <h2>Projects</h2>

    <button class="btn btn-info mb-2" @click="getProjects"> Update </button>
    <button class="btn btn-primary mb-2" @click="showModalCreate()"> Create </button>
    <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search project..." aria-label="Search" v-model="search">
    </div>
    <br>
    <multiselect v-model="selectedTags" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
        <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
    </multiselect> 

    <br>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-bind:key="i" v-for="(projects, i) in filteredProjects">
                <u>Title:</u> {{projects.title}} <br>
                <u>Description:</u> {{(projects.description).slice(0, 150)}}... <br>
                <u>Status:</u> {{projects.status}} <br>
                <u>Tags:</u> <span v-bind:key="n" v-for="(tag, n) in projects.tags" > {{tag.name}}, </span>
                <br>
                <u>Created at:</u> {{(projects.created_at).slice(0, 10)}} /
                <u>Updated at:</u> {{(projects.updated_at).slice(0, 10)}} <br>
                <button class="btn btn-danger mb-2" @click="destroy(projects)"> Delete </button>
                <button class="btn btn-secondary mb-2" @click="edit(projects)"> Edit </button>
                <a :href="'/projects/' + projects.id" ><button class="btn btn-primary mb-2"> Show more </button></a>
            </li>
        </ul>
    </div>

    <pop-up popUpId="create">
        <label> Title: </label>
        <input type="text" name="title" class="form-control" v-model="projectToBeCreated.title">
        <label> Description: </label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="projectToBeCreated.description"></textarea>
         <label> Repository: </label>
        <input type="text" name="repository" class="form-control" v-model="projectToBeCreated.repository">
        <label> Status: </label>
        <select name="status"  class="form-control" v-model="projectToBeCreated.status">
            <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state> {{status.state}} </option>
        </select>
        <label> Username: </label>
        <input type="text" name="username" class="form-control" v-model="projectToBeCreated.username">
        <label> E-mail: </label>
        <input type="text" name="email" class="form-control" v-model="projectToBeCreated.email">
        <label> Tags: </label>
        <multiselect v-model="selectedTagsForCreate" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>

        <br>
        <input type="submit" @click="create()">
    </pop-up>

    <pop-up popUpId="edit">
        <label> Title: </label>
        <input type="text" name="title" class="form-control" v-model="project.title">
        <label>Description: </label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" v-model="project.description"></textarea>
        <label> Repository: </label>
        <input type="text" name="repository" class="form-control" v-model="project.repository">
        <label> Status: </label>
        <select name="status"  class="form-control" v-model="project.status">
            <option v-bind:key="i" v-for="(status, i) in statusList" :value=status.state > {{status.state}} </option>
        </select>
        <label> Username: </label>
        <input type="text" name="username" class="form-control" v-model="project.username">
        <label> E-mail: </label>
        <input type="text" name="email" class="form-control" v-model="project.email">

         <multiselect v-model="selectedTagsForEdit" :options="tagList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Select tag...">
            <template slot="singleLabel" slot-scope="{ tag }">{{ tag.name }}</template>
        </multiselect>
        <input type="submit" @click="update(project)">
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

