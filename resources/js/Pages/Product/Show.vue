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
import {useForm} from "@inertiajs/vue3";

let props = defineProps({
    product: Object,
    showin:Boolean
});

let form = useForm({
    'name': '',
    'email': '',
    'phone':'',
    'quantity':'',
    'product_id':'',
    'customer_id':'',
})

form.product_id = props.product.id;

let submit = () => {

}

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

        <div class="dark:bg-gray-600 dark:text-white max-w-5xl mx-auto bg-gray-300 max-h-fit rounded-3xl shadow-2xl mt-16">
            <div
                class="grid gap-4 grid-cols-2 justify-between"
                :class="!$page.props.auth.user && !!showin?'border-b-2':''"
            >

                <!--Image-->
                <div class="flex">
                    <Image
                        :image="product.image"
                        :classes="'relative z-0 right-20 hover:right-24 rounded-l-full rounded-r-lg h-96 shadow hover:shadow-2xl shadow-gray-900  object-fill object-center'"
                        class="my-auto"
                    />
                </div>

                <div class="col-span-1 px-2 py-10 sm:px-6">
                    <Name
                        :name="product.name"
                        :classes="'text-3xl px-16 rounded-3xl'"
                    />
                    <Description :description="product.description" />

                    <hr class="my-8">

                    <!--Stock-->
                    <div class="flex justify-between items-center">
                        <Stock :stock="product.stock" />
                        <Discount :discount="product.discount" />
                    </div>

                    <!--Price-->
                    <div class="flex justify-between items-center text-md mb-1 leading-6 font-medium text-white">
                        <OldPrice :product="product" />
                        <Price :product="product" />
                    </div>

                    <!--EditDelete-->
                    <div
                        class="flex justify-between items-center place-items-end mt-3"
                        v-if="!!$page.props.auth.user "
                    >
                        <Edit :slug="product.slug" />
                        <Delete :slug="product.slug" />
                    </div>
                    <h3 class="leading-6 text-center dark:text-white w-full" v-else>
                        <div
                            v-text="'Buy Product'"
                            class="bg-teal-500 mx-auto hover:bg-teal-700 w-fit cursor-pointer text-white px-4 py-0.5 rounded-2xl w-fit dark:bg-teal-700 dark:hover:bg-teal-800 transition-all transform duration-700"
                            v-on:click="showin = !showin"
                        />
                    </h3>
                </div>

            </div>
            <div class="py-10 max-w-3xl mx-auto" v-if="!$page.props.auth.user && !!showin ">
                <form @submit.prevent="submit" class="max-w-4xl">
                    <div
                        v-if="$page.props.success !== null"
                        x-data="{ show:true }"
                        x-init="setTimeout(() => show = false, 2000 )"
                        x-show="show"
                        x-transition.duration.500ms
                        class="max-w-xl mx-auto bg-green-200 text-green-600 text-center border border-2 border-teal-600 font-bold rounded-3xl py-1 mb-2 transition transform duration-700"
                        role="alert"
                    >
                        {{ $page.props.success }}
                    </div>

                    <div class="p-4 bg-white w-full rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h2 class="font-bold text-center transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                            Buy {{ product.name }}
                        </h2>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required placeholder="Name" v-model="form.name">
                            <p
                                v-if="$page.props.errors.name"
                                v-for="$error in $page.props.errors.name"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" required placeholder="Email" v-model="form.email">
                            <p
                                v-if="$page.props.errors.email"
                                v-for="$error in $page.props.errors.email"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="phone">
                                Phone Number
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" required placeholder="Phone Number" v-model="form.phone">
                            <p
                                v-if="$page.props.errors.phone"
                                v-for="$error in $page.props.errors.phone"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="quantity">
                                Quantity
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="number" min="1" :max="product.stock" required placeholder="Quantity" v-model="form.quantity">
                            <p
                                v-if="$page.props.errors.quantity"
                                v-for="$error in $page.props.errors.quantity"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                        <input type="hidden" v-model="form.customer_id" name="customer_id">
                        <div class="flex flex-col">
                            <div class="my-4">
                                <button class="bg-blue-500 hover:bg-blue-700 justify-self-end text-white font-bold self-end py-1 px-8 transform duration-700 rounded-xl focus:outline-none focus:shadow-outline" type="submit">
                                    Buy Product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </authenticated-layout>
</template>
