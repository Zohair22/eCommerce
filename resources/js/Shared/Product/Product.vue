<script setup>
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    product: Object,
});

</script>

<template>
    <div class="col-span-1 grid">
        <h3 class="text-xl leading-6 font-semibold text-center dark:text-white">
            <Link :href="'/product/' + product.slug"  v-text="product.name" class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-1 rounded-2xl dark:text-white w-full text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-800 transition-all transform duration-700" />
        </h3>
        <h3 class="text-sm m-2 leading-6 font-medium text-gray-900 dark:text-gray-300">
            {{ product.description }}
        </h3>
        <hr class="mb-2">
        <h3 class="text-md mb-1 leading-6 font-medium text-white" v-if="product.discount > 0">
            <span class="bg-yellow-600 hover:bg-yellow-700 transition-all transform duration-700 rounded-3xl px-4 py-0.5">Discount : {{ product.discount }} %</span>
        </h3>
        <h3 class="text-md mb-1 leading-6 font-medium text-white">
            <span class="bg-red-700 hover:bg-red-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5">In stock : {{ product.stock }}</span>
        </h3>
        <div class="text-md mb-1 leading-6 font-medium text-white">
            <h1 class="bg-indigo-700 mb-1 w-fit hover:bg-indigo-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5 ">
                Price : {{ product.discount > 0 ?  (product.price - (product.price * product.discount)/100).toFixed(2) : product.price }} $
            </h1>
            <h1 class="line-through w-fit bg-indigo-900 hover:bg-indigo-400 transition-all transform duration-700 rounded-3xl px-4 py-0.5" v-if="product.discount > 0">
                Old Price : {{ product.price }} $
            </h1>

        </div>
    </div>
</template>
