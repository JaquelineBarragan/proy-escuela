<template>
    <v-expansion-panels v-model="panel">
        <v-expansion-panel>
            <v-expansion-panel-header>Filtros</v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-row>
                    <v-col>
                        <active-filters />
                    </v-col>
                    <v-col>
                        <v-btn color="success" text @click.prevent="search">Aplicar filtros <v-icon>mdi-download</v-icon></v-btn>
                    </v-col>
                    <v-col>
                        <v-btn color="cyan" text @click.prevent="history">Consultar Historial <v-icon>mdi-history</v-icon></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="4" v-if="filters.group.active"><v-select v-model="filter.group" label="Sub Grupo" :items="groups" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.brand.active"><v-select v-model="filter.brand" label="Marca" :items="brands" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.family.active"><v-select v-model="filter.family" label="Familia" :items="families" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.hasValidation.active">
                        <p>Sujeto a validacion</p>
                        <v-radio-group v-model="filter.hasValidation" mandatory row>
                            <v-radio label="Si" :value="1"></v-radio>
                            <v-radio label="No" :value="0"></v-radio>
                        </v-radio-group>
                    </v-col>
                    <v-col cols="4" v-if="filters.mainLocalization.active"><v-text-field v-model="filter.mainLocalization" label="Localizacion principal" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.shelfLocalization.active"><v-text-field v-model="filter.shelfLocalization" label="Localizacion de estante" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.shelf.active"><v-text-field v-model="filter.shelf" label="Estante" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.measurement.active"><v-text-field v-model="filter.measurement" label="Medida" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.dispatchable.active">
                        <p>Despachable</p>
                        <v-radio-group v-model="filter.dispatchable" mandatory row>
                            <v-radio label="Si" :value="1"></v-radio>
                            <v-radio label="No" :value="0"></v-radio>
                        </v-radio-group>
                    </v-col>
                    <v-col cols="4" v-if="filters.minStock.active"><v-text-field v-model="filter.minStock" label="Inventario minimo" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.quantity.active"><v-text-field v-model.number="filter.quantity" label="Cantidad" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.description.active"><v-text-field v-model="filter.description" label="Descripcion" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.model.active"><v-text-field v-model="filter.model" label="Modelo" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.serialNumber.active"><v-text-field v-model="filter.serialNumber" label="Serie" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.item.active"><v-text-field v-model="filter.item" label="Item" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.user.active"><v-select v-model="filter.user" label="Usuario" :items="users" item-text="email" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.calibrationExpiration.active">
                        <v-menu ref="datePickerMenu" v-model="menu" :close-on-content-click="false" offset-y min-width="auto">
                            <template v-slot:activator="{on, attrs}">
                                <v-text-field v-model="filter.calibrationExpiration" label="Vencimiento de calibracion" v-on="on" v-bind="attrs"></v-text-field>
                            </template>
                            <v-date-picker v-model="filter.calibrationExpiration" label="Vencimiento de calibracion" no-title></v-date-picker>
                        </v-menu>
                    </v-col>
                </v-row>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
import { getToken } from "../../lib/auth";
import activeFilters from "./activeFilters";
import { mapGetters } from "vuex"

export default {
    name: "filters",
    data: () => ({
        panel: 0,
        groups: [{id: 0, name: 'TODOS'}],
        brands: [{id: 0, name: 'TODOS'}],
        families: [{id: 0, name: 'TODOS'}],
        users: [{id: 0, email: 'TODOS'}],
        menu: false,
        filter: {
            group: null,
            brand: null,
            family: null,
            hasValidation: false,
            mainLocalization: null,
            shelfLocalization: null,
            shelf: null,
            measurement: null,
            dispatchable: false,
            minStock: 0,
            quantity: 0,
            description: null,
            model: null,
            serialNumber: null,
            item: null,
            user: null,
            calibrationExpiration: null,
        },
        historyHeaders: [
            {text: 'Item', value: 'tool.item'},
            {text: 'Familia', value: 'family.name'},
            {text: 'Fecha', value: 'created_at'},
            {text: 'Ejecutor', value: 'user.email'},
            {text: 'Actividad', value: 'comment'},
            {text: 'Informacion Actual', value: 'after'},
            {text: 'Informacion Anterior', value: 'before'}
        ]
    }),
    methods: {
        async history() {
            await this.$store.dispatch('filters/setHistoryMode', { value: true })
            this.$emit('loading', true)
            const response = await axios.get('/api/history', getToken())
            if (response.status === 200) {
                const items = response.data.map(item => {
                    return {
                        ...item,
                        before: JSON.parse(item.before),
                        after: JSON.parse(item.after)
                    }
                })
                await this.$store.dispatch('filters/setHistoryItems', { items })
            }
            this.$emit('loading', false)
        },
        async search() {
            this.$emit('loading', true)
            await this.$store.dispatch('filters/setHistoryMode', { value: false })
            const query = {}
            const activeFilters = Object.keys(this.filters).filter(filter => this.filters[filter].active)
            for (let key of activeFilters) {
                if (!_.isEmpty(this.filter[key])) {
                    query[key] = this.filter[key]
                }
            }
            const response = await axios.post('/api/search', query, getToken())
            if (response.status === 200) {
                await this.$store.dispatch('filters/setItems', { items: response.data })
            }
            this.$emit('loading', false)
        }
    },
    computed: {
        ...mapGetters('filters', ['filters','activeFilters'])
    },
    created() {
        axios.get('/api/groups', getToken())
            .then(response => {
                this.groups = this.groups.concat(response.data)
                this.filter.group = this.groups[0]
            })
        axios.get('/api/brands', getToken())
            .then(response => {
                this.brands = this.brands.concat(response.data)
                this.filter.brand = this.brands[0]
            })
        axios.get('/api/families', getToken())
            .then(response => {
                this.families = this.families.concat(response.data)
                this.filter.family = this.families[0]
            })
        axios.get('/api/users', getToken())
          .then(response => {
              this.users = this.users.concat(response.data)
          })
    },
    components: {
        activeFilters
    }

}
</script>

<style scoped>

</style>
