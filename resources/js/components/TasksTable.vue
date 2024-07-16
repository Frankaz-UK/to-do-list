<template>
    <div>
        <b-table striped hover :items="items" :fields="fields"></b-table>
        <b-pagination :per-page="per_page" v-model="current_page" :total-rows="total_rows"></b-pagination>
    </div>
</template>

<script>
export default {
    name: 'Tasks Table',
    data() {
        return {
            current_page: 1,
            last_page: 1,
            per_page: 15,
            total_rows: 0,
            term: null,
            fields: ['id', 'name', 'complete'],
            items: [],
        }
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            let indexRoute = route('tasks.api.index', {
                _query: {
                    page: this.current_page,
                    term: this.term,
                },
            });
            axios.get(indexRoute)
                .then(({data}) => {
                    console.log(data);
                    this.items = data.results.data;
                    this.current_page = data.results.current_page;
                    this.last_page = data.results.last_page;
                    this.total_rows = data.results.total;
                });
        }
    },
    watch: {
        current_page: {
            handler: function(value) {
                this.fetchData();
            }
        }
    },
}
</script>
