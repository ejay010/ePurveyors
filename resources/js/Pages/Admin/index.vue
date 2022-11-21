<script setup>
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({
    greeting: String,
})
</script>

<template>
    <Head title="Administrator">
    </Head>
    <div>
        <div class="flex justify-between p-4 bg-white">
            <div>
                <h4>ePurveyors - Admin</h4>
            </div>
    
            <div>
                <ul class="flex">
                    <li class="mx-4"><a href="#">Admin - System</a></li>
                    <li class="mx-4"><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>

        <h2 class="text-center">
            All Customer Requests
        </h2>
    </div>
</template>