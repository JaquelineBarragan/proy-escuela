<template>
    <div>
        <filters @loading="setLoading"/>
        <v-data-table :headers="activeFilters" :loading="loading" :items="filterableItems">
            <template #top>
                <v-toolbar flat>
                    <v-toolbar-title>Herramientas</v-toolbar-title>
                    <v-divider class="mx-4" inset vertical></v-divider>
                    <v-spacer></v-spacer>
                    <v-text-field v-model="search" label="Buscar" hide-details></v-text-field>
                </v-toolbar>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

import filters from "./filters";
export default {
    name: "index",
    data: () => ({
        loading: false,
        search: null,
        headers: []
    }),
    methods: {
        setLoading(data){
            this.loading = data
        }
    },
    computed: {
        ...mapGetters('filters', ['activeFilters','items']),
        filterableItems() {
            if (this.search === '' || this.search === null) {
                return this.items
            }
            const filteredItems = []
            this.items.forEach(item => {
                const objectString = JSON.stringify(Object.values(item)).toLowerCase()
                if (objectString.includes(this.search)) {
                    filteredItems.push(item)
                }
            })
            return filteredItems
        }
    },
    components: {
        filters
    }
}
</script>

<style scoped>

</style>
