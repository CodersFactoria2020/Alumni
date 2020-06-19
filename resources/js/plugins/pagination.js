import pagination from '../components/pagination';

const Pagination = {
    install (Vue, options) {
        Vue.component(pagination.name, pagination)
        Vue.prototype.$pagination = {}
    }
}

export default Pagination