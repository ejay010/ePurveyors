<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import NavLink from '@/Components/NavLink.vue';

</script>

<template>
<AdminLayout>
    <template #header>
        Islands & Marinas - {{ $page.props.island.name }}
    </template>

    <div class="flex flex-col bg-white m-4 p-4">
        <div class="border-b border-gray-200 flex flex-row justify-between align-middle mb-3">
            <h2 class="text-xl p-2">Marinas</h2>
            <NavLink :href="route('admin.island.marina.create', $page.props.island.slug)">
                Add a marina
            </NavLink>
        </div>

        <ul>
            <li v-for="marina in $page.props.marinas" :key="marina.id">
                <NavLink :href="route('admin.marinas.show', marina.slug)">{{ marina.name }}</NavLink>
            </li>
        </ul>
    </div>
</AdminLayout>
</template>