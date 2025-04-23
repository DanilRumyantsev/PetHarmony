import { createStore } from 'vuex';

const storedFont = localStorage.getItem('currentFont');

export default createStore({
    state: {
        currentFont: storedFont || 'Arial' // Начальный шрифт
    },
    mutations: {
        setFont(state, font) {
            state.currentFont = font;
            localStorage.setItem('currentFont', font);
        }
    },
    actions: {
        changeFont({ commit }, font) {
            commit('setFont', font);
        }
    },
    getters: {
        currentFont: state => state.currentFont
    }
});