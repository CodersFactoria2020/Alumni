<template>
    <div>
        <div class="container">
            <forum-search :app="app"></forum-search>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{name: 'forumhome' }">Inicio Foro</router-link>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <div class="container" v-if="lastPage > 1">
                <pagination :total-pages="lastPage"
                :app="app"
                style="margin-top: 20px"
                :on-click-page="clickPage">
                </pagination>
            </div>

            <div class="container">
                <div class="card" style="display: block" v-if="gotResults">
                    <router-link :to="{ name: 'thread', params: {id: thread.id } }"
                    style="padding: 25px"
                    v-for="(thread, index) in threads"
                    :key="index"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-item-center"
                    >
                        <div>
                            <img class="image" src="../img/fake_user_avatar.jpg">
                            <div style="display: incline-block; vertical-align: botton; margin-left: 10px">
                                <h4>{{ thread.title }}</h4>
                                <span>Post by: {{thread.user.name}}</span>
                                <br>
                                <span>Latest reply: {{thread.latestPost.user.name}}</span>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <span>{{ thread.createdAt | friendlyDate }}</span>
                            <div style="border-radius: 10px; background-color: #b5b3aa; padding: 10px; width: 12px">
                                <span style="font.size: 18px">{{thread.replies}}</span>
                                <br>
                                <span style="font-size: 14px; color: #606f7b">REPLIES</span>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div v-else class="alert alert-info mb-0">
                    No results
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import ForumSearch from '../components/forum-search';

    export default {
        name: 'search',
        components: { ForumSearch },
        props: ['app'],
        data(){
            return{
                searchQuery: this.search ? this.search : this.$route.query.query,
                searchModel: '',
                threads: [],
                baseUrl: BASE_URL,
                currentPage: this.$route.query.page ? this.$route.query.page : 1,
                lastPage: 0,
                gotResults: null,
                loading: null
            };
        },
        mounted(){
            this.search();
        },
        filters: {
            friendlyDate(value) {
                return moment(value).fromNow();
            }
        },
        methods: {
            search(page) {
                this.threads = [];
                this.lastPage = 0;

                if (page) {
                    this.currentPage = page;
                }
                this.app.req.get('thread/search/'+ this.$route.query.query+'?page='+this.currentPage).then(response => {
                    if (response.data.data.length)
                    {
                        this.threads = response.data.data;
                        this.lastPage = response.data.last_page;
                        this.$pagination.currentPage = 1;
                        this.gotResults =true;
                    }
                    else
                    {
                        this.gotResults = false;
                    }
                })
            },
            clickPage(page)
            {
              this.app.req.get('thread/search/'+ this.$route.query.query+'?page='+this.currentPage).then(response => {
                    if (response.data.data.length)
                    {
                        this.threads = response.data.data;
                        this.lastPage = response.data.last_page;
                        this.route.replace({
                            name: 'search',
                            query: {
                                query: this.$route.query.query,
                                page: page
                            }
                        })
                    }
                })
            },
            onSubmit()
            {
                this.$route.replace({
                    name: 'search',
                    query: {
                        query: this.searchModel,
                        page: 1
                    }
                })
                this.search(1);
            }
        }
    };

</script>

<style scoped>
.image {
    height: 75px;
}

.search.input {
    width: 500px;
    height: 50px;
    border: 3px solid #676660;
    border-radius: 15px;
    padding-left: 20px;
    padding-right: 20px;
}
</style>