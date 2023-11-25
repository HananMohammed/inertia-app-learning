<template>
    <Head title="Create User"></Head>
    <n-space vertical>
        <n-card title=" Create New User " size="medium">
            <n-form action="/" method="post" class="mx-w-md mx-auto mt-8" :rules="rules">
                <n-form-item
                    path="name"
                    label="Name"
                    :validation-status="form.errors.name? 'error' :'success'"
                    :feedback="form.errors.name"
                >
                    <n-input
                        v-model:value="form.name"
                        type="text"
                        @keydown.enter.prevent
                    />
                </n-form-item>

                <n-form-item
                    path="email"
                    label="Email"
                    :validation-status="form.errors.email? 'error' :'success'"
                    :feedback="form.errors.email"
                >
                    <n-input
                        v-model:value="form.email"
                        type="text"
                        @keydown.enter.prevent
                    />
                </n-form-item>

                <n-form-item
                    path="password"
                    label="Pass"
                    :validation-status="form.errors.password? 'error' :'success'"
                    :feedback="form.errors.password"
                >
                    <n-input
                        autocomplete="off"
                        v-model:value="form.password"
                        type="password"
                    />
                </n-form-item>

                <button type="submit"
                        :disabled="form.processing"
                        @click.prevent="submit"
                        class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </n-form>
        </n-card>
    </n-space>

</template>
<script setup lang="ts">
import { FormRules } from 'naive-ui'
import { useForm } from "@inertiajs/vue3";

const rules: FormRules = {
    input: {
        required: true,
        trigger: ['focus', 'input'],
    }
}
let form = useForm({
    name:'',
    email:'',
    password:'',
})

const submit = () => {
    form.post('/users')
}
</script>
