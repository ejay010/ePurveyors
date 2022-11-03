<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    // errors: Object,
});

const service_request = useForm({
    island: '',
    marina: '',
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
    <Head title="Welcome" >
    </Head>
    
    <div class="flex flex-col">
        <div class="flex justify-between p-5">
            <!-- logo container-->
            <div>
                <h1>ePurveyors</h1>
            </div>
    
            <!-- nav links-->
            <nav class="space-x-4">
                <a href="#">Login</a>
                <a href="#">Register</a>
            </nav>
        </div>
    
        <!--Location Control container-->
        <div class="flex flex-col container p-10 mx-auto">
            <div class="mx-auto text-center" v-show="!island_is_set">
                <h1 class="text-2xl font-bold">Where are you docked?</h1>
                <p class="mx-auto mb-2">Tell us where you are docked so that we can service you accordingly.</p>
            </div>
    
            <div class="mx-auto" v-show="!island_is_set">
                <form @submit.prevent="set_island" class="flex flex-col md:flex-row space-y-2 md:space-x-4 md:space-y-0">
                    <div class="flex items-center justify-around">
                        <label for="island">Island:</label>
                        <select v-model="service_request.island" name="island" id="island" class=" border-0 border-b shadow rounded" required>
                            <option value="Long Island">Long Island</option>
                        </select>
                    </div>
    
                    <div class="flex items-center justify-around">
                        <label for="marina">Marina:</label>
                        <select v-model="service_request.marina" name="marina" id="marina" class="border-0 border-b shadow rounded" required>
                            <option value="Flying Fish Marina">Flying Fish Marina</option>
                        </select>
                    </div>
    
                    <div class="mx-auto">
                        <button type="submit" class="bg-green-100 px-2 py-1 border-2 border-green-400 rounded-2xl text-green-500">Save Location</button>
                    </div>
                </form>
            </div>
    
            <!--Review of Location Information-->
            <div v-show="island_is_set">
                <h2 class="text-xl font-bold">Docking location</h2>
                
                <p>Island: {{ service_request.island }}</p>
                <p>Marina: {{ service_request.marina }}</p>
                <button class="border-2 rounded-full border-blue-800 py-1 px-2 font-medium text-blue-800 shadow" @click="set_island">Change Location</button>

            </div>
            <div class="text-red-500 flex justify-around my-3" v-if="service_request.errors.island || service_request.errors.marina">
                <p>{{ service_request.errors.island }}</p>
            <p>{{ services_request.errors.marina }}</p>
            </div>
        </div>
    
        <!--Upload List Control-->
        <div class="flex flex-col container p-10 mx-auto">
            <span v-show="!list_is_set" class="mx-auto">
                <h2 class="text-xl font-bold underline-offset-2">Upload your list</h2>
            <p>Send us your grocery list, supply list, or parts list. This form can accept PDF's or Screenshots</p>
            <form class="flex flex-col" @submit.prevent="set_list">
                <div class="flex flex-col mt-4 mx-auto">
                    <label for="list_upload" class="font-semibold">Provisions List</label>
                    <input type="file" id="list_upload" name="list_upload" accept="image/*, application/pdf" @input="service_request.list_file = $event.target.files[0]" required />
                </div>
                <button type="submit" class="mx-auto mt-4 bg-green-100 px-2 py-1 border-2 border-green-400 rounded-2xl text-green-500">Save List</button>
            </form>
            </span>

            <span v-show="list_is_set">
                <div>
                    <h2 class="text-lg font-bold">List File</h2>
                    {{ service_request.list_file.name }}
                    <button class="mx-auto mt-4  px-2 py-1 border-2 border-blue-800 rounded-2xl text-blue-800" @click="set_list">Change File</button>
                </div>
            </span>

            <div class="text-red-500 flex justify-around my-3" v-if="service_request.errors.list">
                <p>{{ service_request.errors.list }}</p>
            </div>
        </div>
    
        <!--Contact Controls-->
        <div class="flex flex-col container p-10 mx-auto" >
            <span v-show="!contact_is_set" class="mx-auto">
                <h2 class="text-xl font-bold">Contact information</h2>
            <p>We will need a way to contact you concerning your request.</p>
            <form class="flex flex-col" @submit.prevent="set_contact">
                <div class="flex flex-col mt-2 mb-2">
                    <label for="name">Name</label>
                    <input class="rounded-lg shadow" type="text" name="name" id="name" v-model="service_request.contact_info.name" required />
                </div>
                <div class="flex flex-col mt-2 mb-2">
                    <label for="email">Email</label>
                    <input class="rounded-lg shadow" type="email" name="email" id="email" v-model="service_request.contact_info.email" required />
                </div>
                <div class="flex flex-col mt-2 mb-2">
                    <label for="tel_phone">Phone Number</label>
                    <input class="rounded-lg shadow" type="tel" name="tel_phone" id="tel_phone" v-model="service_request.contact_info.tel_phone" />
                </div>
                <button type="submit" class="mt-4 mx-auto bg-green-100 px-2 py-1 border-2 border-green-400 rounded-2xl text-green-500">Save Contact Info</button>
            </form>
            </span>
            <span v-show="contact_is_set">
                <h2 class="text-xl font-bold">Contact information</h2>
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
                <button class="mx-auto mt-4  px-2 py-1 border-2 border-blue-800 rounded-2xl text-blue-800" @click="set_contact">Change Info</button>
            </span>

            <div class="text-red-500 flex justify-around my-3" v-if="service_request.errors['contact_info.name'] || service_request.errors['contact_info.email']">
                <p v-if="service_request.errors['contact_info.name']">
                    The name of the person to contact is required.
                </p>
                <p v-if="service_request.errors['contact_info.email']">
                    An email address is required.
                </p>
            </div>

            <p class="mt-4 mx-auto">P.S If we are not able to contact you then consider your request unfullfilled.</p>
        </div>

        <!--Submit Button-->
        <button class="border-2 p-10 m-10 rounded-xl border-blue-800 text-2xl font-bold text-white shadow bg-blue-800 hover:bg-white hover:text-blue-800"
        @click="send_everything">
            Send to ePurveyors
        </button>
        <!--Island Portal-->
        <!-- <div class="flex flex-col mt-4">
                <p class="mx-auto mb-2">Tell us where you are docked so that we can show what is available.</p> -->
    
        <!--context navigation-->
        <!-- <nav class="flex justify-around py-2 mb-4">
                    <a href="#">Vendors</a>
                    <a href="#">Services</a>
                    <a href="#">Events</a>
                </nav> -->
    
        <!--context content-->
        <!-- <div class="container mx-auto flex flex-wrap justify-around -m-1"> -->
        <!--vendor component-->
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!-- <div class="flex flex-col p-2 m-1 rounded shadow-md  hover:border md:flex-row"> -->
        <!-- <div class="flex flex-col"> -->
        <!-- <img src="https://via.placeholder.com/100" /> -->
        <!-- </div>   -->
        <!-- <div class="flex flex-col p-2 space-y-2"> -->
        <!-- <h3 class="text-xl font-semibold">Vendor Name</h3> -->
        <!-- <p>Grocery, Wholesale, Retail</p> -->
        <!-- <a href="#">View Products</a> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
    
        <!--List upload-->
    
    
        <!--Footer-->
        <!-- <div class="flex flex-col m-10 mx-auto p-10">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div> -->
    </div>
</template>
