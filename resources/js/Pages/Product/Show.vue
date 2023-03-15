<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Image from "@/Shared/Product/Image.vue";
import Name from "@/Shared/Product/Name.vue";
import Stock from "@/Shared/Product/Stock.vue";
import Discount from "@/Shared/Product/Discount.vue";
import Description from "@/Shared/Product/Description.vue";
import Price from "@/Shared/Product/Price.vue";
import OldPrice from "@/Shared/Product/OldPrice.vue";
import Edit from "@/Shared/Product/Edit.vue";
import Delete from "@/Shared/Product/Delete.vue";

let props = defineProps({
    product: Object,
});

</script>

<template>
    <Head :title="product.name" />

    <authenticated-layout>
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ product.name }}
                </h2>
            </div>
        </template>

        <div class="grid gap-4 grid-cols-2 justify-between dark:bg-gray-600 dark:text-white max-w-6xl mx-auto bg-gray-300 max-h-fit rounded-3xl shadow-2xl mt-16">

            <div class="flex">
                <Image
                    :image="product.image"
                    class="my-auto"
                    :classes="'relative z-0 right-20 hover:right-24 rounded-l-full rounded-r-lg h-96 shadow hover:shadow-2xl shadow-gray-900  object-fill object-center'"
                />
            </div>

            <div class="col-span-1 px-2 py-10 sm:px-6">
                <Name
                    :name="product.name"
                    :classes="'text-3xl px-16'"
                />
                <Description :description="product.description" />

                <hr class="my-8">

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
                    v-if="!!$page.props.auth.user "
                >
                    <Edit :slug="product.slug" />
                    <Delete :slug="product.slug" />
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>
