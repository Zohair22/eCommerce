<template>
    <h1 class="px-6 text-red-400 hover:text-red-600 dark:text-red-400 dark:hover:text-red-600 shadow-3xl font-extrabold transition-all transform duration-700 text-lg">
        <Link :href="route('category.destroy', name)" methods="DELETE" v-text="'Delete Category'"/>
    </h1>
</template>

<script setup>
defineProps({
    'name':String
})
</script>

<style scoped>

</style>
