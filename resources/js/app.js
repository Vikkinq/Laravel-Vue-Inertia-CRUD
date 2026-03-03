import '../css/app.css'

import { ZiggyVue } from 'ziggy-js'
import { Ziggy } from './ziggy'   // 👈 ADD THIS
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

createInertiaApp({
  resolve: name =>
    resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy) // 👈 PASS Ziggy HERE
      .mount(el)
  },
})