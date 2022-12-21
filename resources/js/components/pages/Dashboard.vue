<template>

    <div class="max-h-screen flex flex-col w-0 flex-1 mt-12 overflow-y-scroll">
        <main class="flex-1 relative z-0 overflow-y-scroll pt-2 pb-6 focus:outline-none md:py-6" tabindex="0">

            <div class="mx-auto px-4 sm:px-6 md:px-8 flex justify-between">
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-semibold text-gray-900">Welcome {{authUser.name}}</h1>
                </div>
            </div>
            
            <div class="mt-2 mx-auto px-4 sm:px-6 md:px-8 border border-gray-300"></div>

            <div class="bg-white shadow overflow-hidden sm:rounded-md mx-12 my-12">
                <ul role="list" class="divide-y divide-gray-200">

                </ul>
            </div>
        </main>
        <Toast 
            :show="alert.show" 
            :title="alert.title" 
            :message="alert.message" 
            @toast-close="alert.show = false"
        ></Toast>         
    </div>    
</template>

<script>
import store from "../../store/index";
import Toast from '@/components/partials/Toast';

export default {

    name: "AdminContainer",
    components : {
        Toast
    }, 
    mounted() {
        this.authUser = store.getters.getAuthUser;
    },
    data: () => {
        return {
            authUser: {
                full_name: ""
            },
            alert: {
                show: false,
                title: '',
                message: '',
            }            
        };
    },
    methods: {
     
    }
};
</script>