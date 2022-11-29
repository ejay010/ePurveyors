<script setup>
import { Head } from '@inertiajs/inertia-vue3'

    defineProps({
        customerRequest: Object,
        listFileUrl: String,
        canLogin: Boolean,
        canRegister: Boolean,
    });

</script>

<template>
    <Head title="Service Request" />

    <div class="flex flex-col">
        <div class="flex justify-between p-5">
            <!-- logo container-->
            <div>
                <h1>
                    ePurveyors
                </h1>
            </div>
    
            <!-- nav links-->
            <nav class="space-x-4">
                <a href="#" class=" hover:text-blue-700 font-semibold">Login</a>
                <a href="#" class=" hover:text-blue-700 font-semibold">Register</a>
            </nav>
        </div>
        <div class="bg-gray-100 flex flex-col">
            <div class="mx-auto m-10 p-6">
            <h1 class="text-2xl font-bold my-4 text-center">Request Details</h1>
        <p class="text-center">Here are the details about your request.</p>
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
        <p>You can expect contact verification within 15 to 20 mins</p>
        <p>P.S If we are not able to contact you then consider your request unfullfilled.</p>
        </div>
        </div>
        
    </div>
</template>