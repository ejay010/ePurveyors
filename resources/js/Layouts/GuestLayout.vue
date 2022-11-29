<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavBarVue from '@/Components/NavBar.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-slate-100">
        <NavBarVue></NavBarVue>        
        <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
