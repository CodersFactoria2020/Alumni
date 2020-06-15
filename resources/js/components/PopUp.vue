<template>
    <div class="modal fade" :id="popUpId">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <slot></slot>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['popUpId']
    }
</script>
