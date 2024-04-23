<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-950">
                    Resumo Financeiro
                </div>
                <dl class="grid max-w-screen-xl grid-cols-3 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-4 dark:text-white sm:p-8">
                    <div class="flex flex-col items-center justify-center text-red-800">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['total_pagar'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Mes</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center text-green-500 dark:text-black">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['total_receber'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Mes</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center text-gray-500 dark:text-black">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['saldo'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Saldo Mes</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center text-red-800">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['total_pagar_ano'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Pagar Ano</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center text-green-500 dark:text-black">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['total_receber_ano'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Total Receber Ano</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center text-gray-500 dark:text-black">
                        <dt class="mb-2 text-3xl font-extrabold">R$ {{number_format($saldos['saldo_ano'],2,',','.')}}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">Saldo Ano</dd>
                    </div>
                </dl>    
            </div>
        </div>
    </div>
<div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <class id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Estatísticas
        </li>
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl class="grid max-w-screen-xl grid-cols-4 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-4 xl:grid-cols-4 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{ $total_students }}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Alunos</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$total_user_teacher}}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Professores</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$total_category}}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Categorias</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$total_events}}</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Eventos Futuros</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
</x-app-layout>
