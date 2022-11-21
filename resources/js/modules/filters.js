export default {
    namespaced: true,
    state: {
        items: [],
        filters: {
            group: { text: 'Sub Grupo', value: 'group.name' ,active: true },
            brand: { text: 'Marca', value: 'brand.name', active: true },
            family: { text: 'Familia', value: 'family.name', active: true },
            hasValidation: { text: 'Sujeto a validacion', value: 'has_validation', active: false },
            mainLocalization: { text: 'Localizacion principal', value: 'main_localization', active: false },
            shelfLocalization: { text: 'Localizacion de estante', value: 'shelf_localization', active: false },
            shelf: { text: 'Estante', value: 'shelf', active: false },
            measurement: { text: 'Medida', value: 'measurement', active: false },
            dispatchable: { text: 'Despachable', value: 'dispatchable', active: false },
            minStock: { text: 'Inventario minimo', value: 'min_stock', active: false },
            quantity: { text: 'Cantidad', value: 'quantity', active: false }
        }
    },
    mutations: {
        setFilters(state, { filters }) {
            state.filters = filters
        },
        setItems(state, { items }) {
            state.items = items
        }
    },
    actions: {
        setFilters({ commit }, { filters }) {
            commit('setFilters', { filters })
        },
        setItems({ commit }, { items }) {
            commit('setItems', { items })
        }
    },
    getters: {
        activeFilters: state => {
            const activeFiltersKeys = Array.from(Object.keys(state.filters)).filter(key => state.filters[key].active)
            return activeFiltersKeys.map(key => state.filters[key])
        },
        filters: state => {
            return JSON.parse(JSON.stringify(state.filters))
        },
        items: state => {
            return state.items
        }
    }
}
