<template>
    <h3 class="text-sm m-2 leading-6 font-medium text-gray-900 dark:text-gray-300">
        {{ description }}
    </h3>
</template>

<script setup>
defineProps({
    'description': String
})
</script>

<style scoped>

</style>
