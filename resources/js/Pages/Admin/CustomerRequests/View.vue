<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import AdminLayoutVue from '@/Layouts/AdminLayout.vue';


const props = defineProps({
    customerRequest: Object,
    listFileUrl: String,
    update_url: String,
})

const form = useForm({
    status: props.customerRequest.status
})

function SubmitChanges() {
    form.post(props.update_url)
}
</script>

<template>
    <Head title="Edit Customer Service Request" />
    
    <AdminLayoutVue>
        <div class="flex flex-col">
            <div class="mx-auto m-5 p-6">
                <h1 class="text-2xl font-bold my-4 text-center">Request Details</h1>
                <ul class="space-y-2 my-4 p-4 rounded-2xl shadow-xl border-blue-800 bg-white">
                    <li>ID: {{ customerRequest.id }}</li>
                    <li>Status: {{ customerRequest.status }}</li>
                    <li>Island: {{ customerRequest.island }}</li>
                    <li>Marina: {{ customerRequest.marina }}</li>
                    <li>Name: {{ customerRequest.customerName }}</li>
                    <li>Email: {{ customerRequest.customerEmail }}</li>
                    <li>Telephone Number: {{ customerRequest.customerTelPhone }}</li>
                    <li>
                        <a :href=listFileUrl target="_blank" class="text-blue-700 hover:underline">View Provisions List File</a>
                    </li>
                </ul>
                <p>Please verify that the customer can be contacted before processing the request.</p>
            </div>
        </div>
    </AdminLayoutVue>
</template>