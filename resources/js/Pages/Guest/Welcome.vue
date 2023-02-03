<script setup>
import NavBarVue from '@/Components/NavBar.vue';
import { Head } from '@inertiajs/inertia-vue3';
import FooterVue from '@/Components/Footer.vue';
import CustomerRequestWizard from '@/Components/CustomerRequestWizard.vue';
import NavLink from '@/Components/NavLink.vue';

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

    <div class="min-h-screen bg-white bg-logo-image bg-no-repeat bg-bottom sm:bg-center sm:bg-cover ">
        <NavBarVue></NavBarVue>
        <main class="flex flex-col sm:flex-row-reverse mt-4 justify-center min-h-screen">
                    <!--Customer Request Wizard-->
            <CustomerRequestWizard :islands="islands" :errors="errors" class="bg-white shadow m-4 rounded sm:max-w-lg h-1/2"></CustomerRequestWizard>

            <div class="flex flex-col bg-white shadow m-4 rounded p-4 sm:max-w-lg h-1/2">
                <h1 class="text-lg font-semibold m-2 text-logoprimary-light">About Epurveyors</h1>
                <p class="m-2">Traveling to a new destination is meant to be enjoyable and sometimes everyday needs can disrupt our adventures. </p>
                <p class="m-2">Epurveyors was created to help you get what you need, when you need it without having to spend so much time figuring out the logistics in a new place meant for exploring. </p>
                <p class="m-2">Our website makes it easy for you to arrange for deliveries of necessities (groceries & liquors) speacialty items, parts & accessories, and even have your laundry collected for washing when you arrive at the dock. </p>
                <p class="m-2">Our friendly staff will not only try their best to meet your provisioning needs but also provide you with a better experience while you enjoy our beautiful islands.</p>
                <p class="m-2">For any other inquiries please feel free to email Cheyanne or Eulond at <a href='mailto:epurveyors700@gmail.com' class='inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-logoprimary hover:border-logoprimary focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'>epurveyors700@gmail.com</a></p>
            </div>
        </main>
        <FooterVue></FooterVue>
    </div>
</template>
