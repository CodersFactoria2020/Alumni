<template>
     <div>
        <div v-if="thread">
            <div class="container">
                <div class="jumbotron">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{ name: 'forumhome' }">Inicio foro</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{ name: 'forum', params: { id: thread.forum.id } }">{{ thread.forum.title }}</router-link></li>
                            <li class="breadcrumb-item">{{ thread.title }}</li>
                        </ol>
                    </nav>

                    <h1 class="display-5">{{ thread.title }}</h1>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <!-- Posts -->

                        <div v-for="(post,index) in thread.posts.data" :key="index" :value="post.id">
                            <img class="image" src="../img/fake_user_avatar.jpg" style="vertical-align: top;"/>
                            <div class="post-container">
                                <span>{{ post.user.name }}</span>
                                <span style="margin-left: 5px; color: #3d4852;">DICE:</span>

                                <hr>

                                <p v-html="post.body" style="margin-top: 20px; margin-bottom: 20px"></p>

                                <hr>

                                <p style="margin-top: 10px; margin-bottom: 0; color: #3d4852">
                                    <small>
                                        {{ post.created_at | friendlyDate }}
                                    </small>
                                </p>
                                <div style="margin-bottom: 10px" v-if="post.user.name === app.user.name">
                                    <a href="javascript:;" @click="goToDelete(post)" 
                                    style="display: block" class="btn btn-sm btn-danger float-right">
                                    Borrar la respuesta
                                    </a>
                                    <a href="javascript:;" @click="goToEdit(post)" 
                                    style="display: block" class="btn btn-sm btn-primary float-right">
                                    Editar la respuesta
                                    </a>                                     
                                </div>                                
                            </div>
                        </div>

                        <!-- Pagination Bottom -->
                        <pagination :total-pages="thread.posts.last_page" 
                                    :page="currentPage"
                                    :app="app"
                                    v-show="thread.posts.last_page > 1"
                                    :on-click-page="clickPage">
                        </pagination>

                        <!-- Reply Button -->

                        <div v-if="app.user">
                            <button v-if="!replyMode" @click="replyMode=true"
                                    type="button" class="btn btn-lg btn-success">
                                Responder
                            </button>

                            <button v-else @click="replyMode=false"
                                    type="button" class="btn btn-lg btn-danger">
                                Cancelar
                            </button>
                        </div>

                        <!-- Reply Form -->

                        <div v-if="replyMode" style="margin-top: 20px">

                            <div v-if="errorBody" class="alert alert-danger">
                                {{ errorBody }}
                            </div>

                            <form v-on:submit.prevent="onSubmit">
                                <quill-editor v-model="body" ref="myQuillEditor" style="height: 300px; margin-bottom: 80px"
                                              :options="editorOption">
                                </quill-editor>

                                <button class="btn btn-lg btn-success float-right" style="margin-bottom: 50px">Enviar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- tags component --> 
                        <tags :app="app"></tags>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- active-threads component -->
                        <active-threads :app="app"></active-threads>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script> 
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
import { quillEditor } from "vue-quill-editor";
import ActiveThreads from "../components/active-threads";
import Tags from "../components/tags";

import moment from 'moment'
Vue.prototype.moment = moment

export default {
    name: 'thread',
    components: { quillEditor, ActiveThreads, Tags },

    data() {
        return {
            thread_id: window.location.href.split('/').pop(),
            thread: null,
            replyMode: false,
            body: '',
            errorBody: null,
            loading: false,
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
    /*
    watch: {
        '$route.params.id': function(newVal) {
            this.thread = null;
            this.currentPage = 1;
            this.getThread(newVal); 
        }
    },
    */
    methods: {
        getThread() {
            this.loading = true
            
            axios.get('/api/threads/' + thread_id).then(response => {
                this.loading = false
                this.thread = response.data;
            });
        }
        /*
        getThread(newVal) {
            this.loading = true;
            let page = 1;
            if(this.currentPage) {
                page = this.currentPage;
            }
            if(newVal) {
                this.threadId = newVal;
            }
            this.app.req.get('thread/'+this.threadId+'?page='+page).then(response => {
                this.loading = false;
               
                if(response.data.id) {
                    this.thread = response.data;
                    this.totalPages = this.thread.posts.last_page;
                }
            });
            
        },
        
        goToEdit(post) {
            this.app.currentPost = post;
            this.$router.push({
                name: 'Post.update'
            });
        },
         goToDelete(post) {
            this.app.currentPost = post;
            this.$router.push({
                name: 'Post.delete'
            });
        },
        /*
        clickPage(page) {
            this.app.req.get('/thread/'+this.threadId+'?page='+page).then(response => {
                this.thread = response.data;
                this.$router.replace({
                    name: 'thread',
                    query: {
                        page: page
                    }
                })
            })
        },
        */
        /*
        onSubmit() {
            if(!this.body) {
                this.errorBody = 'Escribe algo, vag@!';
            }
            else {
                this.errorBody = null;
            }
            if(!this.errorBody) {
                let data = {
                    body: this.body,
                    thread_id: this.threadId
                }

                this.app.req.post('post/create', data).then(response => {
                    this.replyMode = false;
                    this.body = '';

                    this.app.activeThreads.unshift(response.data);

                    let pageToGoTo = 1;
                    let reminder = this.thread.posts.total % 10;

                    if(reminder>0) {
                        pageToGoTo = this.thread.posts.last_page;
                    }
                    else if (remainder === 0) {
                        pageToGoTo = this.thread.posts.last_page+1;
                    }
                    else {
                        pageToGoTo = null;
                    }
                    if(pageToGoTo) {
                        this.app.$pagination.clickPage(pageToGoTo);
                    }
                })
            }
        }
        */
    }
}
</script>

<style>
    p, h1, ol {
        margin-bottom: 0 !important;
    }
    .post-container {
        border: 2px solid #3d4852;
        background-color: #bfbfb3;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 10px;
        color: white;
        display: inline-block;
        width: calc(100% - 90px);
        margin-left: 10px;
    }
    
    .post-container::before {
        content: ' ';
        position: absolute;
        border: 7px solid transparent;
        left: 90px;
        border-right-color: #3d4852;
    }
    
    .image {
        height: 75px;
    }
</style>