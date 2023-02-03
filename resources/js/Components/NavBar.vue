<script setup>
import NavLinkVue from './NavLink.vue';
</script>

<template>
    <div class="flex justify-between p-5 bg-white shadow-md">
            <!-- logo container-->
            <div>
                <h1>
                    <NavLinkVue :href="route('landing')" :active="route().current('landing')" class="sm:font-bold sm:text-xl">EPURVEYORS</NavLinkVue>
                </h1>
            </div>
    
            <!-- nav links-->
            <nav class="space-x-4">
                <NavLinkVue :href="route('login')" :active="route().current('login')">Login</NavLinkVue>
                <!-- <NavLinkVue :href="route('register')" :active="route().current('register')">Register</NavLinkVue> -->
            </nav>
        </div>
</template>