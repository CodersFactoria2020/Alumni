<template>
    <div>
        <spinner v-if="loading"></spinner>
        <div v-else>
        <forum-search :app="app"></forum-search>
            <div class="container" v-for="(forum_category, index) in forum_categories" :key="index" style="margin-bottom:13px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{ forum_category.title }}
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-left align-content-center"
                                        style="height: 100px"
                                        v-for="(forum, forumIndex) in forum_category.fora" :key="forumIndex"> 
                                        <div style="width: 40%; display: inline-block;">
                                            <h5 style="line-height:75px"> 
                                                <router-link :to="{ name: 'forum', params: { id: forum.id } }">
                                                    {{ forum.title }} 
                                                </router-link>
                                            </h5>
                                        </div>
                                        <div style="width: 20%; display: inline-block; text-align: center">
                                            <span style="line-height: 75px">
                                                visitas: {{ forum.views }} / respuestas: <strong> {{ forum.replies }} </strong>
                                            </span>
                                        </div>
                                        <div style="width: 40%; display: inline-block; padding-top: 15px" v-if="forum.latest">
                                            <router-link :to="{ name: 'thread', params: { id: forum.latest.thread_id } }">
                                                {{ forum.latest.thread_title }}
                                            </router-link>
                                            <br> 
                                            <span> by {{ forum.latest.user.name }} &middot;
                                                {{ forum.latest.created_at | friendlyDate}} 
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ForumSearch from './forum-search';

export default {
    name: 'forumCategories',
    components: { ForumSearch },
    props: ['app'],

    data() {
        return {
            forum_categories: null,
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
    },

    methods: {
        getForumCategories() {
            this.loading = true; 

            this.app.req.get("forumCategories").then(response => {
                this.loading = false;
                this.forum_categories = response.data;
            });
        }
    }
}

</script>

<style>

</style>