<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

defineProps({
    errors: Object,
    islands: Object,
});


const service_request = useForm({
    island: {},
    marina: {},
    list_file: {},
    contact_info: {
        name: '',
        email: '',
        tel_phone: ''
    }
});

const island_is_set = ref(false)

function set_island() {
    island_is_set.value = !island_is_set.value
}

const list_is_set = ref(false)

function set_list() {
    list_is_set.value = !list_is_set.value
}

const contact_is_set = ref(false)

function set_contact() {
    contact_is_set.value = !contact_is_set.value
}

function send_everything() {
    service_request.post('/customer-request');
}
</script>

<template>
    <div class="flex">
        <!--Island Control container-->
        <div class="flex flex-col container p-10 mx-auto" v-show="!island_is_set">
            <div class="mx-auto text-center">
                <h1 class="text-2xl font-bold text-logoprimary-light">Where are you docked?</h1>
                <p class="mx-auto mb-2">Tell us where you are docked so that we can service you accordingly.</p>
            </div>

            <div v-show="!island_is_set">
                <form @submit.prevent="set_island"
                    >
                    <div class="my-2">
                        <label for="island">Island:</label>
                        <select v-model="service_request.island" name="island" id="island"
                            class="border-0 shadow rounded block w-full" required>
                            <option v-for="island in islands" :key="island.id" :value="island">{{ island.name }}
                            </option>
                        </select>
                    </div>

                    <div class="my-2">
                        <label for="marina">Marina:</label>
                        <select v-model="service_request.marina" name="marina" id="marina"
                            class="border-0 shadow rounded block w-full" required>
                            <option v-for="marina in service_request.island.marinas" :key="marina.id" :value="marina" :disabled="(marina.is_open === 'Closed') ? true : false ">{{
                                marina.name }} <span v-if="(marina.is_open === 'Closed') ? true : false ">-- Service coming soon</span>
                            </option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="bg-green-100 px-2 py-1 border-1 border-green-400 rounded w-full text-green-500">Set
                            Location</button>
                    </div>
                </form>
            </div>
            <div class="text-red-500 flex justify-around my-3"
                v-if="service_request.errors.island || service_request.errors.marina">
                <p>{{ service_request.errors.island }}</p>
                <p>{{ services_request.errors.marina }}</p>
            </div>
        </div>

        <!--List Control-->
        <div class="flex flex-col container p-10 mx-auto" v-show="island_is_set && !list_is_set">
            <div class="mx-auto">
                <h2 class="text-xl font-bold underline-offset-2">Upload your list</h2>
                <p>Send us your grocery list, supply list, or parts list. This form can accept PDF's or Screenshots</p>
                <form class="flex flex-col" @submit.prevent="set_list">
                    <div class="flex flex-col mt-4 mx-auto">
                        <label for="list_upload" class="font-semibold">Provisions List</label>
                        <input type="file" id="list_upload" name="list_upload" accept="image/*, application/pdf"
                            @input="service_request.list_file = $event.target.files[0]" required />
                    </div>
                    <button type="submit"
                        class="mx-auto mt-4 bg-green-100 px-2 py-1 border-1 rounded w-full shadow border-green-400 text-green-500">Save
                        List</button>
                </form>
            </div>

            <div class="text-red-500 flex justify-around my-3" v-if="service_request.errors.list">
                <p>{{ service_request.errors.list }}</p>
            </div>
        </div>

        <!--Contact Controls-->
        <div class="flex flex-col container p-10 mx-auto" v-show="list_is_set && !contact_is_set">
            <div class="mx-auto">
                <h2 class="text-xl font-bold">Contact information</h2>
                <p>We will need a way to contact you concerning your request.</p>
                <form class="flex flex-col" @submit.prevent="set_contact">
                    <div class="flex flex-col mt-2 mb-2">
                        <label for="name">Name</label>
                        <input class="rounded shadow border-0" type="text" name="name" id="name"
                            v-model="service_request.contact_info.name" required />
                    </div>
                    <div class="flex flex-col mt-2 mb-2">
                        <label for="email">Email</label>
                        <input class="rounded shadow border-0" type="email" name="email" id="email"
                            v-model="service_request.contact_info.email" required />
                    </div>
                    <div class="flex flex-col mt-2 mb-2">
                        <label for="tel_phone">Phone Number</label>
                        <input class="rounded shadow border-0" type="tel" name="tel_phone" id="tel_phone"
                            v-model="service_request.contact_info.tel_phone" />
                    </div>
                    <button type="submit"
                        class="mt-4 mx-auto bg-green-100 px-2 py-1 border-0 shadow border-green-400 rounded w-full text-green-500">Save
                        Contact Info</button>
                </form>
            </div>

            <div class="text-red-500 flex justify-around my-3"
                v-if="service_request.errors['contact_info.name'] || service_request.errors['contact_info.email']">
                <p v-if="service_request.errors['contact_info.name']">
                    The name of the person to contact is required.
                </p>
                <p v-if="service_request.errors['contact_info.email']">
                    An email address is required.
                </p>
            </div>

        </div>

        <!--Review Box-->
        <div v-show="island_is_set && list_is_set && contact_is_set" class="flex flex-col mx-auto p-10">
            <h2 class="text-center text-2xl font-bold">Review and Submit</h2>
            <!-- location -->
            <div class="m-2">
                <div class="flex">
                    <h3 class="text-lg font-bold">Docking location</h3>


                    <button class=" py-1 px-2 font-medium text-blue-800" @click="set_island">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>

                    </button>
                </div>

                <p>Island: {{ service_request.island.name }}</p>
                <p>Marina: {{ service_request.marina.name }}</p>

            </div>

            <!-- File -->
            <div class="m-2">
                <div class="flex">
                    <h3 class="text-lg font-bold">List File</h3>

                    <button class=" px-2 py-1 border-blue-800 rounded-full text-blue-800 " @click="set_list"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </button>
                </div>
                {{ service_request.list_file.name }}

            </div>

            <!--Contact-->

            <div class="m-2">
                <div class="flex">
                    <h3 class="text-lg font-bold">Contact information</h3>

                    <button class="px-2 py-1 text-blue-800" @click="set_contact">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>

                    </button>
                </div>

                <ul class="mb-3">
                    <li>
                        {{ service_request.contact_info.name }}
                    </li>
                    <li>
                        {{ service_request.contact_info.email }}
                    </li>
                    <li>
                        {{ service_request.contact_info.tel_phone }}
                    </li>
                </ul>

            </div>

            <p class="mt-4 mx-auto">P.S If we are not able to contact you then consider your request unfullfilled.</p>

            <!--Submit Button-->
            <button
                class="
                border-2 
                p-4 
                mt-2 
                rounded-xl
                 border-blue-800 
                 text-2xl 
                 font-bold 
                 text-white 
                 shadow 
                 bg-blue-800 
                 hover:bg-white 
                 hover:text-blue-800 
                 disabled:bg-gray-600 
                 disabled:text-black
                 disabled:border-gray-500"
                @click="send_everything" :disabled="service_request.processing">
                Send to ePurveyors
            </button>
        </div>
    </div>
</template>
