<template>
    <div>
        <b-table striped hover :items="items" :fields="fields">
            <template #cell(name)="data">
                <div v-if="data.item.complete">
                    <del>{{ data.item.name }}</del>
                </div>
                <div v-else>
                    {{ data.item.name }}
                </div>
            </template>
            <template #cell(complete)="data">
                <div class="row">
                    <div v-if="!data.item.complete" class="col-6">
                        <form
                            method="post"
                            name="update-task-{{ data.item.id }}"
                            id="update-task-{{ data.item.id }}"
                            :action="fetchRoute('tasks.update', {task: data.item.id})"
                            class="col-6"
                        >
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="_method" value="patch">
                            <button type="submit" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div v-if="!data.item.complete" class="col-6">
                        <form
                            method="post"
                            name="delete-task-{{ data.item.id }}"
                            id="delete-task-{{ data.item.id }}"
                            :action="fetchRoute('tasks.destroy', {task: data.item.id})"
                            class="col-6"
                        >
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">&times;</button>
                        </form>
                    </div>
                </div>
            </template>
        </b-table>
        <b-pagination :per-page="per_page" v-model="current_page" :total-rows="total_rows"></b-pagination>
    </div>
</template>

<script>
export default {
    name: 'Tasks Table',
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
                    this.items = data.results.data;
                    this.current_page = data.results.current_page;
                    this.last_page = data.results.last_page;
                    this.total_rows = data.results.total;
                });
        },
        fetchRoute(routename, param) {
            return route(routename, param);
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
