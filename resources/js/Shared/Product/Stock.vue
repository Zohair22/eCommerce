<template>
    <h3
        class="text-md mb-1 leading-6 font-medium text-white"
    >
        <span
            class="bg-red-700 hover:bg-red-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5"
        >
            In stock : {{ stock }}
        </span>
    </h3>
</template>

<script setup>
defineProps([
    'stock',
])
</script>
