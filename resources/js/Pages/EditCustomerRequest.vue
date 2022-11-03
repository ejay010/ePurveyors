<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

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
            <div class="mx-auto m-5 p-6">
                <h1 class="text-2xl font-bold my-4 text-center">Request Details</h1>
                <p class="text-center">Customer request details below. </p>
                <ul class="space-y-2 my-4 p-4 rounded-2xl shadow-xl border-blue-800 bg-white">
                    <li>ID: {{ customerRequest.id }}</li>
                    <li>
                        <div>
                            Status:
                            <select name="status" id="status" v-model="form.status" class="rounded-md">
                            <option value="Received">Received</option>
                            <option value="Processing">Processing</option>
                            <option value="Out for Delivery">Out for Delivery</option>
                            <option value="Complete">Complete</option>
                        </select>
                        </div>
                    </li>
                    <li>Island: {{ customerRequest.island }}</li>
                    <li>Marina: {{ customerRequest.marina }}</li>
                    <li>Name: {{ customerRequest.customerName }}</li>
                    <li>Email: {{ customerRequest.customerEmail }}</li>
                    <li>Telephone Number: {{ customerRequest.customerTelPhone }}</li>
                    <li>
                        <span></span>
                        <a :href=listFileUrl target="_blank" class="text-blue-700 hover:underline">View Provisions List File</a>
                    </li>
                </ul>
                <p>Please verify that the customer can be contacted before processing the request.</p>
            </div>
            <button class="border rounded-lg px-4 py-2 bg-blue-700 mx-auto text-white" @click="SubmitChanges" :disabled="form.processing">Submit update</button>
        </div>
    
    </div>
</template>