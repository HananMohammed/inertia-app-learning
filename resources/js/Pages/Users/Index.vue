<template>
    <Head>
        <title>Users - Hanan</title>
    </Head>

    <div class="grid grid-cols-4 gap-4 mt-5">
        <h6 class="p-2">Users : </h6>

        <n-form-item label="Name" path="user.name">
            <n-input v-model:value="search" placeholder="Input Name"/>
        </n-form-item>
    </div>
    <Link :href="'/users/create'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-5"> Create
        User
    </Link>

    <n-table :bordered="false" :single-line="false">
        <tbody>
        <tr v-for="user in users.data" :key="user.id">
            <td>{{ user.name }}</td>
            <td>
                <Link :href="'/users/' + user.id + '/edit'"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </Link>
            </td>
        </tr>
        </tbody>
    </n-table>
    <pagination :links="users.links"/>
</template>
<script setup>
import {Head, Link} from '@inertiajs/vue3'
import Pagination from "../../Shared/Pagination.vue";
import {router} from '@inertiajs/vue3'
import {debounce} from "lodash";

const props = defineProps({
    users: Object,
    'filters': Object
})
const search = ref(props.filters.search)
watch(search, debounce(() => {
        router.get('/users', {search: search.value}, {
            preserveState: true,
            replace: true
        })
    }, 500)
)
</script>
<style>
</style>
