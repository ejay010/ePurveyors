<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    name: '',
    description: '',
})

</script>

<template>
    <AdminLayout>
        <div class="flex flex-col bg-white m-2 p-4 shadow">
            <h1 class="my-4">Create an Island</h1>
            <form class="flex flex-col" @submit.prevent="form.post(route('admin.islands.store'))">
                <div class="m-2">
                    <label>Name</label>
                    <input type="text" id="name" name="name" v-model="form.name" required>
                </div>

                <div class="m-2">
                    <label>Description</label>
                    <textarea id="description" name="description" v-model="form.description"></textarea>
                </div>

                <button type="submit">Save Island</button>
            </form>
        </div>
    </AdminLayout>
</template>