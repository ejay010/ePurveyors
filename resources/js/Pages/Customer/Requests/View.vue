<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import NavBarVue from '@/Components/NavBar.vue'
import FooterVue from '@/Components/Footer.vue'

defineProps({
    customerRequest: Object,
    listFileUrl: String,
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Service Request" />
    
    <div class="min-h-screen">
        <NavBarVue></NavBarVue>
        <main class="flex flex-col">
            <h1 class="text-2xl font-bold my-4 text-center text-logoprimary">Request Details</h1>
            <p class="text-center">Here are the details about your request.</p>
            <div class="m-4 sm:mx-auto">
                <ul class="space-y-2 my-4 p-4 border border-logoprimary rounded-lg shadow-lg">
                    <li>Request ID: {{ customerRequest.id }}</li>
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
                <p class="m-2">You can expect contact verification within 15 to 20 mins.</p>
                <p class="m-2">A copy of this request will be sent to the email address provided.</p>
                <p class="m-2">P.S If we are not able to contact you then consider your request unfullfilled.</p>
            </div>
        </main>

        <FooterVue></FooterVue>
        
    </div>
</template>