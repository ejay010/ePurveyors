<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/inertia-vue3'

defineProps({
    customerRequests: Array,
})

</script>

<template>
    <AdminLayout>
        <Head title="All Customer Requests" />
        <template #header>
           All customer requests
        </template>

    <div class="container mx-auto my-4">
        <div class="flex flex-col m-4 h-96 sm:h-1/2 md:h-1/5 overflow-auto">
            <table class="table-auto mx-auto bg-white rounded-lg shadow ">
                <thead class="border-b border-logoprimary-dark">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Island</th>
                        <th class="p-4">Marina</th>
                        <th class="p-4">Customer Name</th>
                        <th class="p-4">Customer Email</th>
                        <th class="p-4">Customer Telephone</th>
                        <th>View or Edit</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr v-for="request in customerRequests" :key="request.id">
                        <td class="py-2 px-4 text-center">
                            {{ request.id }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.status }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.island }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.marina }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.name }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.email }}
                        </td>
                        <td class="py-2 px-4 text-center">
                            {{ request.tel_phone }}
                        </td>
                        <td>
                            <NavLink :href="route('admin.customerRequest.show', {id: request.id})" class="m-2 block text-logoprimary-light hover:text-logoprimary-dark">View</NavLink>
                            <NavLink :href="route('admin.customerRequest.edit', {id: request.id})" class="m-2 block text-logoprimary-light hover:text-logoprimary-dark">Edit</NavLink>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </AdminLayout>
    
</template>