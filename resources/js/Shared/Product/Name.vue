<template>

    <div class="name font-semibold text-center dark:text-white">
        <h1
            class="bg-gray-500 w-fit text-white py-1 dark:text-white text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-800 transition-all transform duration-700 mx-auto"
            :class="classes"
        >
            {{ name }}
        </h1>
    </div>

</template>

<script setup>
defineProps({
    'name': String,
    'classes': String
})
</script>

<style scoped>

</style>
