<template>
    <div
        v-if="success !== null"
        x-data="{ show:true }"
        x-init="setTimeout(() => show = false, 2000 )"
        x-show="show"
        x-transition.duration.500ms
        class="max-w-xl mx-auto bg-green-200 text-green-600 text-center border border-2 border-teal-600 font-bold rounded-3xl py-1 mb-2 transition transform duration-700"
        role="alert"
    >
        {{ success }}
    </div>
</template>

<script setup>
defineProps({
    'success':String
})
</script>

<style scoped>

</style>
