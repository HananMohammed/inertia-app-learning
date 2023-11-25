<template>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        <span class="text-white p-2">Welcome Back {{ $page.props.auth?.user?.username  ?? ''}}</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <NavLink href="/" :active="$page.url==='/'" pageName="Home" />
                            <NavLink href="/settings" :active="$page.url==='/settings'" pageName="Settings" />
                            <NavLink href="/users?foo=bar" :active="$page.component == 'Users'" pageName="Users" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </nav>
</template>
<script setup>
import NavLink from "./NavLink.vue";

</script>
<style>
.font-bold{
    font-weight: bold;
}
</style>
