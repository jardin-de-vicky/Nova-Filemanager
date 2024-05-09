import IndexField from './field/IndexField';
import DetailField from './field/DetailField';
import FormField from './field/FormField';
import VueViewer from 'v-viewer';
import Clipboard from 'v-clipboard3';

Nova.booting((app, store) => {
    app.use(VueViewer);
    app.use(Clipboard) ;
    app.component('index-filemanager-field', IndexField);
    app.component('detail-filemanager-field', DetailField);
    app.component('form-filemanager-field', FormField);
});
