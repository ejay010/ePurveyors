<script setup>
import AdminLayoutVue from '@/Layouts/AdminLayout.vue';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    customer_requests: Array,
    administrator: Object,
})
</script>

<template>
    <AdminLayoutVue>
        <template #header>
            Admin Dashboard
        </template>
        <div>
            <h1 class="text-2xl font-medium m-4 text-center">All Customer Requests</h1>
        </div>
        
    </AdminLayoutVue>
</template>