<template>
    <h3 class="leading-6 text-center dark:text-white">
        <Link
            :href="route('product.destroy', slug)"
            v-text="'Delete'"
            class="bg-red-500 hover:bg-red-700 w-fit text-white px-4 py-0.5 rounded-2xl w-full dark:bg-red-700 dark:hover:bg-red-800 transition-all transform duration-700"/>
    </h3>
</template>

<script setup>
defineProps({
    'slug':String
})
</script>

<style scoped>

</style>
