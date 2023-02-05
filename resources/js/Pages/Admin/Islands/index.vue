<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <AdminLayout>
        <div class="flex bg-white m-2 p-4 shadow">
            <div class="flex flex-col">
                <h2 class="border-b font-semibold text-xl text-center">Islands</h2>

                <ul class="m-2">
                    <li v-for="island in $page.props.Islands" :key="island.id">
                        <NavLink :href="route('admin.islands.show', island.slug)">{{ island.name }}</NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </AdminLayout>
</template>