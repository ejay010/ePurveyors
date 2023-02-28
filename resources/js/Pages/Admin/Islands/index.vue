<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>

<template>
    <AdminLayout>
        <div class="flex bg-white m-2 p-4 shadow">
            <div class="flex flex-col">
                <div class="flex flex-row justify-between min-w-full">
                    <h2 class="border-b flex-grow font-semibold text-xl text-center">Islands
                    </h2>

                    <NavLink :href="route('admin.islands.create')">Add an Island</NavLink>
                </div>
    
                <ul class="m-2">
                    <li v-for="island in $page.props.Islands" :key="island.id">
                        <NavLink :href="route('admin.islands.show', island.slug)">{{ island.name }}</NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </AdminLayout>
</template>