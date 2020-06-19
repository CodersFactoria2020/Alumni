<template>
    <div>
        <spinner v-if="loading"></spinner>
        <div v-else-if="forum">
            <div class="container">
                <div class="jumbotron">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'forumhome' }">
                                    Inicio foro
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                {{ forum.title }}
                            </li>
                        </ol>
                    </nav>
                    <h1 class="display-4"> {{ forum.title }} </h1>
                </div> 
            </div>
        </div>

        <div class="container" v-if="forum">
            <div class="row">
                <div class="col-md-8">
                    <div style="margin-bottom: 60px" v-if="app.user">
                        <a href="javascript:;" @click="goToCreate(forum)" 
                        style="display: block" class="btn btn-lg btn-success float-right">
                            Crea un hilo
                        </a> 
                    </div>

                    <div class="card" style="display: block">
                        <div class="list-group list-group-flush">
                            <router-link :to="{ name: 'thread', params: { id: thread.id } }"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                v-for="(thread, index) in forum.threads.data" :key="index" style="padding: 25px">
                                <div>
                                    <!-- image -->
                                
                                    <div style="display: intline-block; vertical-align: bottom; margin-left: 10px">
                                        <h4> {{ thread.title | shortTitle }} </h4>
                                        <span>Autor: {{ thread.user.name }} </span>
                                        <br>

                                        <span>
                                            Último comentario: {{ thread.latestPost.user.name }}  &middot; 
                                            {{ thread.latestPost.created_at | friendlyDate }}
                                        </span>
                                       
                                    </div>  
                                </div>
                                
                                <div style="text-align: center">
                                    <span> {{ thread.created_at | friendlyDate }} </span>
                                    <div style="border-radius: 10px; background-color: #b5b3aa; padding: 10px; width: 125px">
                                        <span style="border-radius: 18px"> {{ thread.postCount -1 }} </span>
                                        <br>
                                        <span style="font-size: 14px; color: #606f7b"> REPLIES </span>

                                    </div>
                                </div>
                            </router-link>
                        </div>
                        
                        <!-- pagination -->
                        <pagination :total-pages="lastPage" 
                                    :page="currentPage"
                                    :app="app"
                                    :on-click-page="clickPage">
                        </pagination>

                    </div>
                </div>

                <div class="col-md-4">
                    
                    <!-- tags -->
                    <tags :app="app"></tags> 
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 float-right">
                    <!-- active threads -->
                    <active-threads :app="app"></active-threads>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ActiveThreads from "../components/active-threads";
import Tags from "../components/tags";

export default {
    name: 'fora',
    components: { ActiveThreads, Tags },
    props: ['app'],
    data() {
        return {
            forumId: this.$route.params.id,
            forum: null,
            baseUrl: BASE_URL,
            lastPage: 0,
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
            loading: false
        };
    },
    mounted() {
        let $this = this;
        this.getForum();
    },
    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
            },
        shortTitle(value) {
            return value.length > 35 ? value.substring(0, 35) + "..." : value;
        }
    },
    methods: {
        getForum() {
            this.loading = true;
            this.app.req.get('forum/'+this.forumId).then(response => {
                this.loading = false;
                if (response.data.id) {
                    this.forum = response.data;
                    this.lastPage = response.data.threads.last_page;
                }
                
            });
        },
        goToCreate(forum) {
            this.app.currentForum = forum;
            this.$router.push({
                name: 'thread.create'
            });
        },
        clickPage(page) {
            this.app.req.get('/forum/'+this.forumId+'?page='+page).then(response => {
                if(response.data.id) {
                    this.forum = response.data;
                    this.lastPage = response.data.threads.last_page;
                    this.$router.replace({
                        name: 'forum',
                        query: {
                            page: page
                        }
                    })
                }
            })
        }
    }
}
</script>

<style>
</style>