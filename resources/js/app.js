import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";

createInertiaApp({
    title: title => `${title} - My App`,
    progress: {
        delay: 250,
        color: '#29d',
        includeCSS: true,
        showSpinner: false,
    },
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        )
       if (name !== 'Auth/Login') {
           page.default.layout ??= Layout
       }

        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
