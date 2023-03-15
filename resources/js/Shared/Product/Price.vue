<template>
    <h1
        class="bg-indigo-700 mb-1 w-fit hover:bg-indigo-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5"
    >
        Price : {{
            product.discount > 0 ? (product.price - (product.price * product.discount) / 100).toFixed(2) : product.price
        }} $
    </h1>
</template>

<script setup>
defineProps({
    product: Object
})
</script>

<style scoped>

</style>
