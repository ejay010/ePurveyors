<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import ApplicationLogoVue from '@/Components/ApplicationLogo.vue';

const form = useForm({
    email: '',
    password: ''
})

const handleSubmit = () => {
    form.post(
        route('admin.login.post'), {
            onFinish: () => form.reset('password'),
        }
    )
}
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <ApplicationLogoVue class="h-48 w-48 md:h-80 md:w-80 mx-auto"></ApplicationLogoVue>
        <div class="flex flex-col mx-auto border rounded-md shadow-md p-2 md:p-6 m-2 text-center">
            <h1>Administrator</h1>
            <form class="form" @submit.prevent="handleSubmit">
                <div class="flex justify-between items-center m-2">
                    <label>Email Address</label>
                    <input v-model="form.email" type="email" class="m-2 rounded-md" name="email" id="email" />
                </div>

                <div class="flex justify-between items-center m-2">
                    <label>Password</label>
                    <input v-model="form.password" type="password" class="m-2 rounded-md" name="password" id="password" />
                </div>

                <button type="submit" class="w-full bg-logoprimary border rounded p-4 shadow-lg text-white" :disabled="form.processing">Login</button>
            </form>
        </div>
    </div>
</template>