<template>
    <h1 class="px-6 text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-600 shadow-3xl font-extrabold transition-all transform duration-700 text-lg">
        <Link :href="route('category.edit', slug)" v-text="'Edit Category Name'"/>
    </h1>
</template>

<script setup>
defineProps({
    'slug':String
})
</script>

<style scoped>

</style>
