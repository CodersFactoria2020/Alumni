<template>
    <spinner v-if="loading"></spinner>
    <div v-else-if="app.currentForum">
        <div class="container">
            <div class="jumbotron">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'forumhome' }">Inicio foro</router-link>
                        </li>
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'forum', params: { id: app.currentForum.id } }">
                                {{ app.currentForum.title }}
                            </router-link>
                        </li>
                        <li class="breadcrumb-item">Nuevo hilo</li>
                    </ol>
                </nav>

                <h1>{{ app.currentForum.title }}</h1>
                <h5>Nuevo hilo</h5>

            </div>
        </div>
        <div class="container">
            <div class="alert alert-danger" v-if="errors.length">
                <strong>Correct following errors</strong>
                <ul class="my-0">
                    <li v-for="(error, index) in errors" :key="index">
                        {{ error }}
                    </li>
                </ul>
            </div>

            <form v-on:submit.prevent="onSubmit">
                <div class="form-group">
                    <input type="text" v-model="title" class="form-control" v-bind:class="{ 'is-valid': errorTitle }"
                    placeholder="Title" style="height: 70px; font-size: 40px; padding: 15px">
                </div>

                <!-- quill editor -->
                <quill-editor v-model="body" ref="myQuillEditor" style="height: 500px; margin-bottom: 60px"></quill-editor>

                <button class="btn btn-lg btn-success float-right" style="margin-bottom: 50px"> Crear </button>
            </form>
        </div>
    </div>
</template>

<script>
import "quill/dist/quill.core.css"
import "quill/dist/quill.snow.css"
import "quill/dist/quill.bubble.css"
import { quillEditor } from 'vue-quill-editor';
export default {
    name: 'thread-create',
    props: ['app'],
    components: {
        quillEditor
    },
    data() {
        return {
            title: '',
            body: '',
            errorTitle: null,
            errors: [],
            loading: false
        };
    },
    mounted() {
        if (!this.app.currentForum) {
            this.$router.push({
                name: 'forumhome'
            });
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];
            if (!this.title) {
                this.errorTitle = 'El hilo debe tener un titulo!';
                this.errors.push(this.errorTitle);
            }
            else {
                this.errorTitle=null;
            }
            if(!this.errors.length) {
                let data = {
                    forum_id: this.app.currentForum.id,
                    title: this.title,
                    body: this.body
                }
                this.loading = true;
                this.app.req.post('thread/create', data).then(response => {
                    this.loading = false;
                
                    if (response.data.id) {
                        this.app.activeThreads.unshift(response.data);
                        this.app.threadCount ++;
                        this.$router.push({
                            name: 'thread',
                            params: {
                                id: response.data.id
                            }
                        })
                    }
                })
            }
        }
    }
}
</script>

<style>
    .jumbotron {
        padding: 50px
    }
</style>