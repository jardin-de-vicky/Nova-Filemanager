import IndexField from './field/IndexField';
import DetailField from './field/DetailField';
import FormField from './field/FormField';
import VueViewer from 'v-viewer';
import Clipboard from 'v-clipboard3';

Nova.booting((app, store) => {
    app.use(VueViewer);
    app.use(Clipboard) ;
    app.component('index-file-manager-field', IndexField);
    app.component('detail-file-manager-field', DetailField);
    app.component('form-file-manager-field', FormField);
});
