<template>
    <h3
        class="text-md mb-1 leading-6 font-medium text-white"
        v-if="discount > 0"
    >
            <span
                class="bg-yellow-600 hover:bg-yellow-700 transition-all transform duration-700 rounded-3xl px-4 py-0.5"
            >
                Discount : {{ discount }} %
            </span>
    </h3>
</template>

<script setup>
defineProps({
    'discount': String
})
</script>

<style scoped>

</style>
