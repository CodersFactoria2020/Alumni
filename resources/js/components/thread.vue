<template>
    <div>
        <div class="search-container justify-content.center">
            <div class="forum-group" style="margin-top: 25px">
                <form v-on:submit.prevent="onSubmit">
                    <input type="text" class="search-input" placeholder="Busca en el hilo..." v-model="search">
                </form>
            </div>
        </div>

        <div v-if="thread">
            <div class="container">
                <div class="thread_title">
                    <h2 class="display-5">Hilo: <strong v-html="thread.title"></strong></h2>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Posts -->
                        
                        <div v-for="(post,index) in filteredPosts" :key="index">
                            <img class="image" src="../img/fake_user_avatar.jpg" style="vertical-align: top;"/>
                            <div class="post-container">
                                <span>{{ post.user.name }}</span>
                                <span>DICE:</span>
                                 <div class="float-right" v-if="auth_user.id === post.user.id">
                                    <a @click="edit(post)"><i class="fa fa-edit icons-m button-s"></i></a>                                  
                                    <a @click="destroy(post)"><i class="fa fa-trash icons-m button-s"></i></a>                                  
                                </div> 
                                <hr>

                                <p v-html="post.body"></p>

                                <hr>

                                <p>
                                    <small>
                                        {{ post.created_at | friendlyDate }}
                                    </small>
                                </p>
                                                               
                            </div>
                        </div>
                        <div>
                           <a @click="showCreateModal()" class="btn btn-lg btn-primary">Responder</a>
                        </div>
                        <!-- Reply Form -->
                        <pop-up popUpId="create">
                            <form class="selector">
                                <input v-model="newPost.user_id" hidden>
                                <input v-model="newPost.thread_id" hidden>
                                <quill-editor v-model="newPost.body" ref="myQuillEditor" style="height: 300px; margin-bottom: 80px"
                                            :options="editorOption">
                                </quill-editor>
                                <input type="submit" @click="create()" value="Crear">
                            </form>            
                        </pop-up>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Form -->
        <pop-up popUpId="edit">
            <form class="selector">
                <label>Hey {{auth_user.name}}! Edita tu comentario en el editor de texto de aquí abajo y pulsa el botón 'editar'.</label>
                <quill-editor v-model="post.body" ref="myQuillEditor" style="height: 300px; margin-bottom: 80px"
                            :options="editorOption">
                </quill-editor>
                <input type="submit" @click="update(post)" value="Actualizar">
            </form>
        </pop-up>
    </div>
</template>

<script> 
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
import { quillEditor } from "vue-quill-editor";
import PopUp from './PopUp';

import moment from 'moment'
Vue.prototype.moment = moment

export default {
    name: 'thread',
    components: { quillEditor, PopUp },
    props: ['auth_user'],
   
    data() {
        return {
            thread_id: null,
            thread: {
                posts: []
            },
            post: {
                body: ''
            },
            newPost: {
                body: '',
                user_id: null 
            },
            replyMode: false,
            errorBody: null,
            loading: false,
            editorOption: {
                placeholder: 'Escribe tu comentario aqui...',
                theme: 'snow', 
            },
            search: ''
        };
    },

    mounted() {
        this.getThread();
    },
    
    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },
    
    methods: {

        getThread() {
            this.thread_id = window.location.href.split('/thread/').pop()

            axios.get('/api/threads/' + this.thread_id).then(response => {
                this.loading = false
                this.thread = response.data;
            });
        },

        clearPost() {
            this.newProject = {};
        },

        showEditModal(post) {
            this.post = post;    
            $('#edit').modal('show')
        },

        showCreateModal() {
            this.newPost.user_id = this.auth_user.id;
            this.newPost.thread_id = this.thread.id;
            $('#create').modal('show')
        },

        closeCreateModal() {
            $('#create').modal('hide')
        },

        closeEditModal() {
            $('#edit').modal('hide')
        },

        create() {
            axios.post('/api/posts', this.newPost).then(response =>{
                if(!this.post.body) {
                    this.errorBody = 'Escribe algo pedazo de vag@';
                }
                this.getThreads();
                this.clearThread();
                this.closeCreateModal();
            });
        },

        edit(post) {
            axios.get('/api/posts/' + post.id).then(response => {
                this.showEditModal(response.data);
            });
        },

        update(post) {
            axios.patch('/api/posts/' + post.id, this.post).then(response =>{
                this.getThread();
                this.closeEditModal();
                this.clearPost();
            });
        },

        destroy(post) {
            axios.delete('/api/posts/' + post.id).then(response => {
                this.getThread();
            })
        },
    },

    computed: {
        filteredPosts() {
            return this.thread.posts.filter((post) => {
                return post.body.toLowerCase().match(this.search.toLowerCase())
            })
        }
    }
}
</script>

<style scoped>   
    .fade  {
        opacity: 1 !important;
    }
    
    .post-container {
        border: solid 2px #FF4700!important;
        background-color: #bfbfb3;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 10px;
        color: white;
        display: inline-block;
        width: calc(100% - 90px);
        margin-left: 10px;
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

    .thread_title {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    h2 {
        font-size: 28px;
    }

</style>