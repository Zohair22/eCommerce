<template>
    <h1
        class="line-through w-fit bg-indigo-900 hover:bg-indigo-400 transition-all transform duration-700 rounded-3xl px-4 py-0.5"
        v-if="product.discount > 0"
    >
        Old Price : {{ product.price }} $
    </h1>
</template>

<script setup>
defineProps({
    'product':Object
})
</script>

<style scoped>

</style>
