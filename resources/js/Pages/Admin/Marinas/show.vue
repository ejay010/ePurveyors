<script setup>
    import AdminLayout from '@/Layouts/AdminLayout.vue';
    import NavLink from '@/Components/NavLink.vue';

let props = defineProps({
    marina: Object,
    island: Object
})
</script>

<template>
    <AdminLayout>
        <template #header>
            {{ marina.name }}
        </template>

        <ul class="flex flex-col bg-white m-2 p-2">
            <li>Status: {{ marina.is_open }}
                <NavLink :href="route('admin.marina.toggleStatus', marina.slug)" v-if="marina.is_open === 'Closed'">Open It</NavLink>
                <NavLink :href="route('admin.marina.toggleStatus', marina.slug)" v-if="marina.is_open === 'Open'">Close It</NavLink>
            </li>
            <li>Description: {{ marina.description }}</li>
        </ul>
    </AdminLayout>
</template>