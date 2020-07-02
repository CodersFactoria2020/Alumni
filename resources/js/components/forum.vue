<template>
    <div class="container">
        <div class="search-container justify-content.center">
            <div class="forum-group" style="margin-top: 25px">
                <form v-on:submit.prevent="onSubmit">
                    <input type="text" class="search-input" placeholder="Busca en el hilo..." v-model="search">
                </form>
            </div>
        </div>

        <div class="title-button">
            <h2>{{ forum_category.title }}</h2>
            <button class="button-1" @click="showModalCreate()"> Crea un hilo </button>
        </div>
    
        <div style="margin-bottom:13px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-list" style="height: auto">
                        <div class="card-header">
                            <h2>Hilos</h2>
                        </div>     
                    
                        <div class="card-body" v-for="(thread, index) in filteredThreads" :key="index">
                            <a v-bind:href="'/thread/' + thread.id">
                                <p v-html="thread.title"></p>
                            </a>
                            <h5></h5><br>
                            <h5>Por: {{ thread.user.name }} Vistas: {{ thread.views }} Respuestas: {{ thread.replies }}</h5> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <pop-up popUpId="create">
            <form class="selector">
                <label>Hey! Escribe tu comentario para iniciar un nuevo hilo</label>
                <h5>Crea un nuevo hilo</h5>
                <input v-model="newThread.user_id" hidden>
                <quill-editor v-model="newThread.title" ref="myQuillEditor" :options="editorOption" style="height: 300px; margin-bottom: 80px">
                </quill-editor>
                <input v-model="newThread.forum_category_id" hidden>
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
            forum_category_id: null,
            forum_category: null,
            forum_categories: [],
            threads: [],
            newThread: {
                languages: [],
            },
            languageList: [],
            selectedLanguagesForCreate: null,
            editorOption: {
                placeholder: '¿De qué quieres hablar? Escribe aquí la temática del hilo',
                theme: 'snow', 
            },
            latestFourUpdatedThreads: null,
            search: ''
        }
    },

    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },

    mounted() {
        this.getForumCategories();
        this.getForumCategory();
        this.getAllThreads();
        this.getLanguages();
        this.getLatestFourUpdatedThreadsInForumCategory();
    },

    methods: {
        getForumCategory() {
            this.forum_category_id = window.location.href.split('/forum/').pop()
            axios.get('/api/forumCategory/' + this.forum_category_id).then(response => {
                this.forum_category = response.data
            })
        },

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
            this.newThread.forum_category_id = this.forum_category_id
            $('#create').modal('show')
        },
        closeModalCreate() {
            $('#create').modal('hide')
        },
        create() {
            this.newThread.languages = this.selectedLanguagesForCreate;
            axios.post('/api/threads',this.newThread).then(response =>{
                this.getAllThreads();
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
    },

    computed: {
        filteredThreads() {
            return this.forum_category.threads.filter((thread) => {
                return thread.title.toLowerCase().match(this.search.toLowerCase())
            })
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
br {
  line-height:.4rem;
}
.card-header {
    justify-content: space-between !important;
}

.search-input {
    width: 500px;
    height: 50px;
    border: 3px solid #333;
    border-radius: 15px;
    padding-left: 20px;
    padding-right: 20px;
}

.search-container {
    display: flex;
    background-image: url("../img/Forum-main-background-grey-orange.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;       
    justify-content: center;
    align-items: center;
    flex-flow: wrap;
    height: 20vh;
}

h2 {
    font-size: 28px;
}

.title-button {
    margin-top: 40px;
}
</style>