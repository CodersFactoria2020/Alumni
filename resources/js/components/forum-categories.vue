<template>
    <div class="container">
        <div class="title-button">
            <h2>Foro</h2>
            <button class="button-1" @click="showModalCreate()"> Crea un hilo </button>
        </div>

        <div v-for="(forum_category, index) in forum_categories" :key="index" style="margin-bottom:13px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-list" style="height: auto">
                        <div class="card-header"> 
                            {{ forum_category.title }}
                            <div>
                            <a @click="showModalCreate()"><i class="fa fa-plus icons-s button-s"></i></a>
                            </div>
                        </div>     
                        <div class="card-body" v-for="(thread, index) in forum_category.threads.slice(0,4)" :key="index">
                            <a v-bind:href="'/thread/' + thread.id">
                                <p v-html="thread.title"></p>
                            </a>
                            <br>
                            Por: {{ thread.user.name }} Vistas: {{ thread.views }} Respuestas: {{ thread.replies }}   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <pop-up popUpId="create">
            <form class="selector">
                <label>Hey  escribe tu comentario para iniciar un nuevo hilo</label>
                <h5>Crea un nuevo hilo</h5>
                <input v-model="newThread.user_id" hidden>
                <quill-editor v-model="newThread.title" ref="myQuillEditor" :options="editorOption" style="height: 300px; margin-bottom: 80px">
                </quill-editor>
                <label> Sección del Foro:* </label>
                <select name="forum_category_id"  class="form-control" v-model="newThread.forum_category_id" required>
                    <option v-bind:key="i" v-for="(forum_category, i) in forum_categories" :value="forum_category.id"> {{ forum_category.title }} </option>
                </select>
                <label> Etiquetas: </label>
                <multiselect v-model="selectedLanguagesForCreate" :options="languageList" track-by="name" label="name" :multiple="true" :taggable="true" placeholder="Escoge..." required>
                    <template slot="singleLabel" slot-scope="{ language }">{{ language.name }}</template>
                </multiselect>
                <input type="submit" @click="create()" value="Crear">
            </form>
        </pop-up>
    </div>
</template>

<script>
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
import { quillEditor } from "vue-quill-editor";
import Multiselect from 'vue-multiselect'; 
import PopUp from './PopUp';

import moment from 'moment'

Vue.prototype.moment = moment

export default {
    name: 'ForumCategories',
    props: ['auth_user'],
    components: {
        quillEditor,
        Multiselect,
        PopUp
    },

    data() {
        return {
            forum_categories: [],
            threads: [],
            newThread: {
                languages: [],
            },
            languageList: [],
            selectedLanguagesForCreate: null,
            editorOption: {
                placeholder: '¿De que quieres hablar? Escribe aquí la temática del hilo',
                theme: 'snow', 
            },
            latestFourUpdatedThreads: null,
            loading: false,
        }
    },

    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },

    mounted() {
        this.getForumCategories();
        this.getAllThreads();
        this.getLanguages();
        this.getLatestFourUpdatedThreadsInForumCategory();
    },

    methods: {
        getForumCategories() {
            this.loading = true; 

            axios.get("/api/forumCategories").then(response => {
                this.loading = false;
                this.forum_categories = response.data;
            });
        },
        getAllThreads() {
            this.loading = true;  

            axios.get("/api/threads").then(response => {
                this.loading = false;
                this.threads = response.data;
            });
        },
        getLanguages() {
            axios.get('/api/languages').then(response =>{
                this.languageList = response.data;
            });
        },
        clearThread() {
            this.newThread = {};
        },
        showModalCreate() {
            this.newThread.user_id = this.auth_user.id;
            $('#create').modal('show')
        },
        closeModalCreate() {
            $('#create').modal('hide')
        },
        create() {
            this.newThread.languages = this.selectedLanguagesForCreate;
            axios.post('/api/threads',this.newThread).then(response =>{
                this.getAllThread();
                this.clearThread();
                this.closeModalCreate();
            });
        },
        getLatestFourUpdatedThreadsInForumCategory() {
            this.loading = true; 

            axios.get("/api/threads/latestfourupdatedthreads").then(response => {
                this.loading = false;
                this.latestFourUpdatedThreads = response.data;
            });
        }
    }
}

</script>

<style scoped>
a {
    color: black !important;
}
.fade {
    opacity: 1;
}
</style>