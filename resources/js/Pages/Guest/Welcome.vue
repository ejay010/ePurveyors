<script setup>
import NavBarVue from '@/Components/NavBar.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CustomerRequestWizard from '@/Components/CustomerRequestWizard.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    errors: Object,
    islands: Object,
});
</script>

<template>
    <Head title="Welcome">
    </Head>

    <div class="min-h-screen sm:bg-slate-100 bg-white bg-logo-image bg-no-repeat bg-bottom sm:bg-center sm:bg-cover ">
        <NavBarVue></NavBarVue>
        <main class="flex flex-col sm:flex-row-reverse mt-4 justify-center min-h-screen">
                    <!--Customer Request Wizard-->
            <CustomerRequestWizard :islands="islands" :errors="errors" class="bg-white shadow m-4 rounded sm:max-w-lg h-1/2"></CustomerRequestWizard>

            <div class="flex flex-col bg-white shadow m-4 rounded p-4 sm:max-w-lg h-1/2">
                <h1 class="text-lg font-semibold m-2 text-logoprimary-light">About Epurveyors</h1>
                <p class="m-2">Epurveyors is a platform that you can use to send us the list of supplies that you would need for your vessel. </p>
                <p class="m-2">That list could be a list of grocery items or even a list of services such as cleaning, laundry, or plumbing. </p>
                <p class="m-2">After we have verified the authenticity of your request, all correspondence will be via your email address that you have provided to us.</p>
                <p class="m-2">Should there be an immediate need to contact you we will utilize the telephone contact provided to us.</p>
            </div>
        </main>
        <footer class="bg-logosecondary text-white h-24 flex justify-around items-center shadow-xl">
            <a href="#">
                <img src="f_logo_RGB-White_1024.png" class="w-6 h-6" alt="facebook logo">
            </a>
            <a href="#">
                <img src="Instagram_Glyph_White.svg" class="w-6 h-6" alt="instagram logo">
            </a>
            <a href="#">
                <img src="whatsapp.png" class="w-6 h-6" alt="whatsapp logo">
            </a>
        </footer>
    </div>
</template>
