<template>
     <div>
        <spinner v-if="loading"></spinner>
        <div v-else-if="thread">
            <div class="container">
                <div class="jumbotron">
                    <h1 class="display-5">{{ thread.title }}</h1>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <!-- Posts -->
                        
                        <div v-for="(post,index) in thread.posts" :key="index">
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
                                <!-- display this ONLY if the user is logged in -->
                                <div style="margin-bottom: 10px" v-if="auth_user.id === post.user.id">
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
                        
                        <!-- Reply Button -->

                        <div>
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
    components: { quillEditor },
    props: ['auth_user'],
   
    data() {
        return {
            thread_id: null,
            thread: null,
            replyMode: false,
            body: '',
            errorBody: null,
            loading: false,
        };
    },

    mounted() {
        this.getThreadId();
        this.getThread();
    },
    
    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },
    
    methods: {
        
        getThreadId() {
            this.thread_id = window.location.href.split('/thread/').pop()
        },
        
        getThread() {
            this.loading = true
            
            axios.get('/api/threads/' + this.thread_id).then(response => {
                this.loading = false
                this.thread = response.data;
            });
        }
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