<template>
    <div>
        <img
            :src="image"
            alt="Image"
            :class="classes"
            class="w-full mx-auto cursor-pointer filter backdrop-filter grayscale hover:grayscale-0 hover:object-cover object-fill transition-all transform duration-700"
        />
    </div>
</template>
<script setup>
defineProps({
    'image': String,
    'classes': String
})
</script>

<style scoped>

</style>
