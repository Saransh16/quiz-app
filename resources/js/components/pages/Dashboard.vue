<template>

    <div class="max-h-screen flex flex-col w-0 flex-1 mt-12 overflow-y-scroll">
        <main class="flex-1 relative z-0 overflow-y-scroll pt-2 pb-6 focus:outline-none md:py-6" tabindex="0">

            <div class="mx-auto px-4 sm:px-6 md:px-8 flex justify-between">
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-semibold text-gray-900">Welcome {{authUser.full_name}}, Hope you are doing well!</h1>
                    <h2 class="text-xl font-semibold text-gray-900">All the best for your exam.</h2>
                </div>
            </div>
            
            <div class="mt-2 mx-auto px-4 sm:px-6 md:px-8 border border-gray-300"></div>

            <div class="flex justify-center mx-auto px-4 sm:px-6 md:px-8 h-full mt-12">
                <div>
                    <div class="text-2xl text-center font-bold tracking-tight text-gray-700">
                        Quiz Instructions
                    </div>
                    <li class="mt-4 text-md text-left text-gray-500">
                        The quizzes consists of questions carefully designed to help you self-assess 
                        your comprehension of the information presented on the topics covered in the module.                         
                    </li>
                    <li class="mt-2 text-md text-left text-gray-500">
                        Anyone suspected by an official of cheating will be disqualified. You must not use any mobile device during
                        a quiz competition.                    
                    </li>
                    <li class="mt-2 text-md text-left text-gray-500">
                        Any kind of written or printed material is not allowed. 
                    </li>
                    <li class="mt-2 text-md text-left text-gray-500">
                        No data will be collected on the website regarding your responses or how many times you take the quiz.                    
                    </li>
                    <div class="mt-16 text-center">
                        <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Start Quiz
                        </button>
                    </div>                    
                </div>
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
        console.log(this.authUser);
    },
    data: () => {
        return {
            authUser: {},
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