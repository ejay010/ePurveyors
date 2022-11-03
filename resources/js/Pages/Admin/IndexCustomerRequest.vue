<script setup>
import { Head } from '@inertiajs/inertia-vue3'

defineProps({
    customerRequests: Array,
})

</script>

<template>
    <Head title="All Customer Requests" />

    <div class="container mx-auto my-4">
        <h1 class="text-2xl font-bold my-3">Customer Requests</h1>
        <table class="table-auto ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Marina</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Telephone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="" v-for="customerRequest in customerRequests" :key="customerRequest.id">
                    <td class="border p-2">{{ customerRequest.id }}</td>
                    <td class="border p-2">{{ customerRequest.status }}</td>
                    <td class="border p-2">{{ customerRequest.marina }}</td>
                    <td class="border p-2">{{ customerRequest.name }}</td>
                    <td class="border p-2">{{ customerRequest.email }}</td>
                    <td class="border p-2">{{ customerRequest.tel_phone }}</td>
                    <td class="border p-2">
                        <a :href="customerRequest.edit_url">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>