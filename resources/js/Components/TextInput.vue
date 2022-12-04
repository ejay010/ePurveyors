<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <input class="border-logoprimary focus:border-logoprimary focus:ring focus:ring-logoprimary-light focus:ring-opacity-50 rounded-lg shadow" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>
