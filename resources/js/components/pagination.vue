<template>
    <div class="pagination-wrapper">
        <div class="my-pagination">
            <a @click="previous" class="prev page-numbers" href="javascript:;">
                anterior
            </a>

            <a @click="clickPage(page)"
               v-for="(page, index) in getNumberOfPagesShown" :key="index" class="page-numbers"
               v-bind:class="{ active: page === currentPage }" href="javascript:;">
                {{ page }}
            </a>

            <a @click="next" class="next page-numbers" href="javascript:;">
                siguiente
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'pagination',
    props: ['app', 'onClickPage', 'totalPages', 'page'],
    data() {
        return {
            currentPage: parseInt(this.page),
            lastPage: 0
        }
    },
    
    mounted() {
        this.app.$pagination = this;
    },
    
    computed: {
        getNumberOfPagesShown()
        {
            if (this.totalPages > 10)
            {
                return 10;
            }
            return this.totalPages;
        }
    },
    methods: {
        previous() {
            if (this.currentPage === 1) {
                return;
            }
            this.currentPage--;
            this.clickPage(this.currentPage);
        },

        next() {
            if (this.currentPage === this.totalPages) {
                return;
            }
            this.currentPage++;
            this.clickPage(this.currentPage);
        },
            
        clickPage(page)
        {
            this.currentPage = page;
            this.onClickPage(this.currentPage);
        }
    }
}
</script>

<style>
</style>