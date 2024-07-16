<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <template v-if="!beforeStart">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Welcome to
                    Trivia
                    Game</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button @click.prevent="beforeStart = !beforeStart"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Click
                        to Start</button>
                </div>
            </div>
        </template>
        <!-- <template v-else>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Who is the
                    President of Nigeria</h2>
            </div>
            <div class="space-y-4 mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex items-center">
                    <input id="option1" name="options" type="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="option1" class="ml-2 block text-base font-medium text-gray-900">Option 1</label>
                </div>
                <div class="flex items-center">
                    <input id="option2" name="options" type="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="option2" class="ml-2 block text-base font-medium text-gray-900">Option 2</label>
                </div>
                <div class="flex items-center">
                    <input id="option3" name="options" type="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="option3" class="ml-2 block text-base font-medium text-gray-900">Option 3</label>
                </div>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
                </div>
            </div>
        </template> -->
        <template v-else>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Good Job <span class="text-indigo-600">John Doe</span></h2>
                <h2 class="mt-10 text-center text-xl font-bold leading-9 tracking-tight text-gray-900">Score: <span class="text-indigo-600">8/10</span></h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Restart</button>
                </div>
            </div>
        </template>

    </div>
</template>

<script>
export default {
    name: 'Trivia',
    data() {
        return {
            beforeStart: false,
            hello: 'helloooooo0000'
        }
    }
}
</script>