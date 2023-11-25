<template>
    <n-space vertical>
        <n-card title="Login" size="medium" class="grid place-items-center min-h-screen">
            <n-form action="/" method="post" class="mx-w-md  mt-8 bg-white p-8 rounded mx-auto" >
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
                        @click.prevent="login"
                        class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
            </n-form>
        </n-card>
    </n-space>

</template>
<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    email:'',
    password:'',
})

const login = () => {
    form.post('/login')
}
</script>
