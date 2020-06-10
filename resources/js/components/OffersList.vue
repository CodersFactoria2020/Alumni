<template>

  <div>
    <h2>Job offers</h2>

    <button class="btn btn-info mb-2" @click="getTests"> Update </button>

    <ul class="list-group">
      <li class="list-group-item" v-bind:key="jobOffer" v-for="jobOffer in jobOfferList">
        {{jobOffer.name}}
        <br>
        <button class="btn btn-danger mb-2" @click="destroy(jobOffer)"> Delete </button>
        <button class="btn btn-primary mb-2" @click="showModal(jobOffer)"> Show more </button>
      </li>
    </ul>

    <div class="modal fade" id="create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            {{jobOffer.id}}
            {{jobOffer.name}}
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    import Vue from 'vue'
    import VueModalTor from 'vue-modaltor'
    Vue.use(VueModalTor)

    export default {
      name: 'OffersList',
        data(){
          return {
            jobOfferList: [],
            jobOffer: {}
          }
        },

        methods: {
          getTests() {
            axios.get('/api/test').then(response =>{
              this.jobOfferList = response.data; 
            });
          },
          destroy(jobOffer) {
            axios.delete('/api/test/' + jobOffer.id).then(response =>{
              this.getTests();
            })
          },
          showModal(jobOffer) {
            // axios.get('/api/test/' + jobOffer.id).then(response =>{
            //   this.jobOffer = response.data; 
            // });
            this.jobOffer = jobOffer
            $('#create').modal('show')
          }
        },

        mounted() {
          this.getTests();
        }
    }
</script>

<style scoped>
</style>


<!-- <button class="btn btn-danger mb-2" @click="showModal = !showModal"> Show More </button>
<modal v-if="showModal" @close="showModal = false">
  <h3 slot="header">custom header</h3>
  <p>HOLA SLOWCODERS</p>
</modal> -->

<!-- <vue-modaltor :visible="open" :bgOverlay="'transparent'" :bgPanel="'rgba(255,255,255,1)'" @hide="hideModal">
<p>This persons last name is: {{person.name}}</p>
</vue-modaltor>
<button @click="open=true">modal-basic</button> -->