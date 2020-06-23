<template>
    <div class="container justify-content.center">
        <div class="search-container justify-content.center">
            <div class="forum-group" style="margin-top: 25px">
                <form v-on:submit.prevent="onSubmit">
                    <input type="text" class="search-input" placeholder="Busca en los foros..." v-model="searchQuery">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ForumSearch',
        
        data() {
            return {
                searchQuery: ''
            }
        },
        methods: {
            onSubmit() {
                this.$router.push({
                    name: 'search',
                    query: {
                        query: this.searchQuery
                    }
                });
            }
        }
    }
</script>

<style scoped>
.body {
    margin: 0;
}
    .container {
        display: flex;
        background-image: url("../img/Forum-main-background-grey-orange.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        width: 89%;
        height: 90%;
        padding: 15px;
        margin-top: 25px; 
        margin-bottom: 15px;        
        justify-content: center;
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
        flex-direction: column;
        flex-flow: wrap;
    }
</style>