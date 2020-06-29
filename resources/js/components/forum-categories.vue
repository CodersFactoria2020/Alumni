<template>
    <div>
        <spinner v-if="loading"></spinner>
        <div v-else>
            <div class="container" v-for="(forum_category, index) in forum_categories" :key="index" style="margin-bottom:13px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-list" style="height: auto">
                            <div class="card-header"> 
                                {{ forum_category.title }}
                            </div>
                            <div class="card-body" v-for="(thread, index) in threads" :key="index">
                                    <a v-bind:href="'/thread/' + thread.id">
                                        {{ thread.title }}
                                    </a>
                                <br>
                                Por: {{ thread.user.name }} Vistas: {{ thread.views }} Respuestas: {{ thread.replies }}   

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

Vue.prototype.moment = moment

export default {
    name: 'ForumCategories',
    components: {  },

    data() {
        return {
            forum_categories: null,
            threads: null,
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
</style>