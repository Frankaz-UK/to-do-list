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
                    <div style="visibility: hidden">
                        complete action
                    </div>
                    <div class="col-5 me-2">
                        <form
                            method="post"
                            name="update-task-{{ data.item.id }}"
                            id="update-task-{{ data.item.id }}"
                            :action="fetchRoute('tasks.update', {task: data.item.id})"
                            class="col-6"
                        >
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="_method" value="patch">
                            <button v-if="!data.item.complete" type="submit" class="btn btn-success">
                                <FontAwesomeIcon icon="fa-solid fa-check" />
                            </button>
                            <button v-else type="submit" class="btn btn-outline-info">
                                <FontAwesomeIcon icon="fa-sold fa-undo" />
                            </button>
                        </form>
                    </div>
                    <div v-if="!data.item.complete" class="col-5 me2">
                        <form
                            method="post"
                            name="delete-task-{{ data.item.id }}"
                            id="delete-task-{{ data.item.id }}"
                            :action="fetchRoute('tasks.destroy', {task: data.item.id})"
                            class="col-6"
                        >
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">
                                <FontAwesomeIcon icon="fa-solid fa-xmark" />
                            </button>
                        </form>
                    </div>
                </div>
            </template>
        </b-table>
        <b-pagination :per-page="per_page" v-model="current_page" :total-rows="total_rows"></b-pagination>
    </div>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

export default {
    name: 'Tasks Table',
    components: {FontAwesomeIcon},
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            current_page: 1,
            last_page: 1,
            per_page: 15,
            total_rows: 0,
            term: null,
            fields: [
                {
                    key: "id",
                    label: "#"
                },
                {
                    key: "name",
                    label: "Name"
                },
                {
                    key: "complete",
                    label: "Actions"
                }
            ],
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
