<template>
    <div class="card">
        <div class="card-header">Lenguajes y Categorias</div>
        <div class="list-group list-group-flush">
            <p v-for="(category, index) in categoryTags" :key="index">
                {{ category }}
            </p>
            
            <!--
            <router-link :to="{ name: 'thread', params: { id: thread.id } }" class="list-group-item"
                        v-for="(thread, index) in app.activeThreads" :key="index">
                <strong> {{ thread.title }} </strong>
                <br>
                
                <small>by {{ thread.latestPost.user.name }} &middot; {{ thread.latestPost.created_at | friendlyDate }}</small>
                
            </router-link>
            -->
        </div>
    </div>
</template>

<script> 
    export default {
        name: "tags",
        props: ['app'],
        data() {
            return {
                languageTags: [],
                categoryTags: ['hacking', 'virus', 'gaming', 'clean code']
            }
        },
        methods: {
            getCategoryTags() {
                this.app.req.get("categories").then(response => {
                    this.categoryTags = response.data;
                    
                })
            }
        }
        /*
        filters: {
            friendlyDate(value)
            {
                return moment(value).fromNow();
            }
        }, */
    }
</script>

<style scoped>
</style>