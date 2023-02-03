<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Welcome back, {{ $page.props.auth.user.name }}
                    </div>

                    <div class="p-6 border-gray-200 m-3">
                        <div class="border-b border-gray-200">
                        <h2>Provisions requested</h2>
                        </div>
                        
                        <div>
                            <a href="#">Create a new request</a>
                            <ul>
                                <li v-for="request in $page.props.provisionsRequested">
                                    {{ request.island }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
