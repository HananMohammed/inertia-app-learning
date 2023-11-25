<template>
    <Link :href="href"
          :class="{
                'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium': active,
                'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium': !active
           }"
    >
        {{ pageName }}
    </Link>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
    href: {
        type: String,
    },
    active: {
        type: Boolean,
    },
    pageName: {
        type: String,
    }
})
</script>
