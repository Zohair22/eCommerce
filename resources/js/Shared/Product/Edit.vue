<template>
    <h3 class="leading-6 text-center dark:text-white">
        <Link
            :href="route('product.edit', slug)" v-text="'Edit'"
            class="bg-blue-500 hover:bg-blue-700 w-fit text-white px-4 py-0.5 rounded-2xl w-full dark:bg-blue-700 dark:hover:bg-blue-800 transition-all transform duration-700"
        />
    </h3>
</template>

<script setup>
defineProps({
    'slug':String
})
</script>
