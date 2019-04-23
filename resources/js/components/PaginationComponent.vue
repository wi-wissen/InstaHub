<!-- https://codeburst.io/pagination-with-ajax-request-using-laravel-and-vue-fc584b6fa1ea -->
<template>
    <nav aria-label="Pagination">
    <ul class="pagination justify-content-center">
        <li class="page-item" v-bind:class="{ disabled: (pagination.current_page <= 1) }">
            <a @click.prevent="changePage(1)" class="page-link" href="#" aria-label="First">
                «
            </a>
        </li>
        <li class="page-item" v-bind:class="{ disabled: (pagination.current_page <= 1) }">
            <a @click.prevent="changePage(pagination.current_page - 1)" class="page-link" href="#" aria-label="Previous">
                ‹
            </a>
        </li>

        <li v-for="(page, index) in pages" :key="`page-${index}`" :class="isCurrentPage(page) ? 'active' : ''" class="page-item">
            <a @click.prevent="changePage(page)" class="page-link" href="#">{{ page }}</a>
        </li>

        <li class="page-item" v-bind:class="{ disabled: (pagination.current_page >= pagination.last_page) }">
            <a @click.prevent="changePage(pagination.current_page + 1)" class="page-link" href="#" aria-label="Next">
                ›
            </a>
        </li>
        <li class="page-item" v-bind:class="{ disabled: (pagination.current_page >= pagination.last_page) }">
            <a @click.prevent="changePage(pagination.last_page)" class="page-link" href="#" aria-label="Next">
                »
            </a>
        </li>
    </ul>
    </nav>

</template>

<style>
    .pagination {
        margin-top: 40px;
    }
</style>

<script>
    export default {
        props: ['pagination', 'offset'],

        methods: {
            isCurrentPage(page) {
                return this.pagination.current_page === page;
            },

            changePage(page) {
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }

                this.pagination.current_page = page;
                this.$emit('paginate');
            }
        },

        computed: {
            pages() {
                let pages = [];

                let from = this.pagination.current_page - Math.floor(this.offset / 2);

                if (from < 1) {
                    from = 1;
                }

                let to = from + this.offset - 1;

                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                while (from <= to) {
                    pages.push(from);
                    from++;
                }

                return pages;
            }
        }
    }
</script>