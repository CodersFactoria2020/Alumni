<template>

    <div>
        <h5>Title: {{project.title}}</h5><br>
        <h5>Description: {{project.Description}}</h5>  <br>
        <h5>Repository: {{project.repository}}</h5>  <br>
        <h5>Status: {{project.status}}</h5>  <br>
        <h5>Username: {{project.username}}</h5> <br>
        <h5>E-mail: {{project.email}}</h5>  <br>
        <h5>Created at: {{project.created_at}}</h5>  <br>
        <h5>Updated at: {{project.update_at}}</h5>  <br>
    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'OffersList',

        components: {
            Multiselect,
        },

        props: ['project'],

        data(){
            return {
            }
        },

        methods: {
        },

        computed: {
        },

        mounted() {
        }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

