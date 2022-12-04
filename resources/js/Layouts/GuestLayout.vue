<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavBarVue from '@/Components/NavBar.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-white">
        <NavBarVue></NavBarVue>
        <ApplicationLogo class="h-80 w-80 mx-auto"></ApplicationLogo>        
        <div class="w-full sm:max-w-md mx-auto mt-3 px-6 py-4 bg-white shadow-lg border-logosecondary-light border overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
