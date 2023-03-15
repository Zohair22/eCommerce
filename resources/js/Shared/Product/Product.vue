<script setup>

import Image from "@/Shared/Product/Image.vue";
import Name from "@/Shared/Product/Name.vue";
import Stock from "@/Shared/Product/Stock.vue";
import Discount from "@/Shared/Product/Discount.vue";
import Price from "@/Shared/Product/Price.vue";
import OldPrice from "@/Shared/Product/OldPrice.vue";
import Edit from "@/Shared/Product/Edit.vue";
import Delete from "@/Shared/Product/Delete.vue";

let props = defineProps({
    product: Object,
    filters: Object,
});

</script>

<template>
    <div>
        <Link
            :href="'/product/'+ product.slug + '/show'"
            class="text-gray-900 dark:text-gray-200 hover:text-gray-700 transition-all transform duration-700"
        >
            <Image
                :image="product.image"
                :classes="'rounded-t-3xl h-48'"
            />
        </Link>
        <Link
            :href="'/product/'+ product.slug + '/show'"
        >
            <Name
                :classes="'px-5'"
                :name="product.name"
            />
        </Link>
    </div>

    <div class="col-span-1 px-2 py-10 sm:px-6">
        <div class="flex justify-between items-center">
            <Stock :stock="product.stock" />
            <Discount :discount="product.discount" />
        </div>

        <div class="flex justify-between items-center text-md mb-1 leading-6 font-medium text-white">
            <Price :product="product" />
            <OldPrice :product="product" />
        </div>

        <div
            class="flex justify-between items-center place-items-end mt-3"
            v-if="filters.search !== null && !!$page.props.auth.user"
        >
            <Edit :slug="product.slug" />
            <Delete :slug="product.slug" />
        </div>
    </div>
</template>
