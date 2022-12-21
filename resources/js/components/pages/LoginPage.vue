<template>
    <div>
        <div class="min-h-screen bg-white flex">
            <div class="flex-1 flex flex-col justify-center py-8 px-4 sm:px-6 lg:px-20 xl:px-24">
                <div class="mx-auto w-full max-w-sm lg:w-96 shadow-md p-8 rounded-lg">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900">
                            Sign In
                        </h2>
                    </div>

                    <div class="mt-4">
                        <div class="mt-6">
                            <form @submit.prevent="login()" class="space-y-6 text-gray-700">                                                        
                                <div class="space-y-1">
                                    <label for="email" class="block text-sm font-normal text-gray-700">
                                        Email address
                                    </label>
                                    <div class="mt-1">
                                        <input type="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label for="password" class="block text-sm font-normal text-gray-700">
                                        Password
                                    </label>
                                    <div class="mt-1">
                                        <input type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="relative mt-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                New to Quiz App?
                            </span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button @click="goToRegister()" type="button" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create your Quiz App account
                        </button>
                    </div>
                </div>
            </div>
        </div>           
    </div>   
</template>

<script>

export default {
    name : 'LoginPage'
}
</script>