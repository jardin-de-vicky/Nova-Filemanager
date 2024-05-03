import IndexField from './field/IndexField.vue';
import DetailField from './field/DetailField.vue';
import FormField from './field/FormField.vue';
import VueViewer from 'v-viewer';
import Clipboard from 'v-clipboard3';

Nova.booting((app) => {
    app.use(VueViewer);
    app.use(Clipboard) ;
    app.component('index-filemanager-field', IndexField);
    app.component('detail-filemanager-field', DetailField);
    app.component('form-filemanager-field', FormField);
});
