<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

let props = defineProps({
    island_selected: Object,
    islands: Object,
})

let form = useForm({
   island: null,
   name: null,
   description: null, 
})

if (ref(props.island_selected) !== null) {
    form.island = ref(props.island_selected).value
}
</script>

<template>
    <AdminLayout>

        <div class="flex flex-col mx-auto p-4 m-2 bg-white w-3/4 rounded shadow">
        <h2 class="text-xl">Create a Marina</h2>
        <hr>
        <form class="flex flex-col" @submit.prevent="form.post(route('admin.marina.store'))">
            <div class="flex flex-col m-2">
                <label for="island">
                    Island (Required)
                </label>
                <div v-if="island_selected">
                    <input type="text" name="island" id="island" class="rounded-md" v-model="form.island.name" required disabled /> 
                    <input type="hidden" name="island_slug" v-model="form.island.slug"/>                   
                </div>
            </div>

            <div class="flex flex-col m-2">
                <label for="name">
                    Marina Name (Required)
                </label>
                <input type="text" name="name" id="name" class="rounded-md" v-model="form.name" required  />
            </div>
            
            <div class="flex flex-col m-2">
                <label for="description">Short Description (Optional)</label>
                <textarea name="description" id="description" class="rounded-md" v-model="form.description" ></textarea>
            </div>

            <button type="submit" class="bg-green-300 border rounded-lg p-4">
                Create Marina
            </button>
        </form> 
    </div>
    </AdminLayout>
</template>