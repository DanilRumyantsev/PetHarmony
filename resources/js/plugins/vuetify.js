// plugins/vuetify.js
import 'vuetify/styles'
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import { VDateInput } from 'vuetify/labs/components';
import { VFileUpload } from 'vuetify/labs/VFileUpload'
import { ru } from 'vuetify/locale'
import '@mdi/font/css/materialdesignicons.css'

const vuetify = createVuetify({
    components: {
        ...components,
        VDateInput,
        VFileUpload,
    },
    directives,
    locale: {
        locale: 'ru',
        messages: { ru }
    },
});

export default vuetify;
