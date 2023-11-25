<template>
    <div class="m-5">
        <Component :is="link.url ? Link : 'span'"
                   v-for="link in links"
                   :class="{'text-gray-500' : !link.url , 'font-bold' : link.active}"
                   :href="link.url"
                   class="px-1"
                   v-html="link.label"

        />
    </div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import {defineProps} from "vue";

defineProps({
    links: Array
})
</script>
