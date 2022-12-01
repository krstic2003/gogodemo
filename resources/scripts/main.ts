import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "vite-plugin-laravel/inertia";
import { createPinia } from "pinia";
import MasonryWall from '@yeger/vue-masonry-wall'

const pinia = createPinia();

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob("./pages/**/*.vue")),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(pinia)
            .use(plugin)
            .use(MasonryWall)
            .mount(el);
    },
});

// JQuery setup
import $ from "jquery";
window.$ = window.JQuery = $;
